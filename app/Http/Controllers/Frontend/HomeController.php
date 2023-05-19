<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Director;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Partners;
use App\Models\Paylasim;
use App\Models\PaylasimTranslation;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Who;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Cars::where('status', 1)->get();
        $partners = Partners::where('status', 1)->get();
        $sliders = Slider::where('page', 'index')->where('status', 1)->get();
        $sliderTitle = settings('sliderTitleIndex_' . app()->getLocale());
        $sliderDescription = settings('sliderDescriptionIndex_' . app()->getLocale());
        $who = Who::first();
        $directors = Director::where('status', 1)->get();
        return view('frontend.index', get_defined_vars());
    }

    public function search(Request $request)
    {

    }

    public function newsletter(Request $request)
    {
//        try {
        $validator = Validator::make($request->all(), [
            'newsletterEmail' => 'unique:newsletter|required|max:255',
        ]);
        $subscriber = Newsletter::create([
            'mail' => $request->newsletterEmail,
            'token' => md5(time()),
            'status' => 0,
        ]);
        $data = [
            'id' => $subscriber->id,
            'mail' => $subscriber->mail,
            'token' => $subscriber->token,
        ];
        Mail::send('backend.mail.newsletter', $data, function ($message) use ($subscriber) {
            $message->to($subscriber->mail);
            $message->subject('Email adresinizi təsdiq edin!');
        });
//            return redirect()->back()->with('successMessage', __('messages.success'));
//        } catch (Exception $e) {
//            return redirect()->back()->with('errorMessage', __('messages.error'));
//        }
    }

    public function verifyMail($id, $token)
    {
        $subscriber = Newsletter::find($id);
        if ($subscriber->token == $token) {
            $subscriber->update([
                'status' => 1,
            ]);
            return view('frontend.includes.mail');
        }
    }

    public function createOrder()
    {
        return view('frontend.order.index');
    }

    public function newOrder(Request $request)
    {
//        try {
//            $receiver = settings('mail_receiver');
//            $order = new Order();
//            $order->name = $request->name;
//            $order->surname = $request->surname;
//            $order->email = $request->email;
//            $order->phone = $request->phone;
//            $order->order = $request->order;
//            $order->save();
//            $data = [
//                'name' => $order->name,
//                'surname' => $order->surname,
//                'email' => $order->email,
//                'phone' => $order->phone,
//                'order' => $order->order
//            ];
//            Mail::send('backend.mail.order', $data, function ($message) use ($receiver) {
//                $message->to($receiver);
//                $message->subject(__('backend.you-have-new-order'));
//            });
//            alert()->success(__('messages.success'));
//            return redirect(route('frontend.createOrder'));
//        } catch (Exception $e) {
//            alert()->error(__('backend.error'));
//            return redirect(route('frontend.createOrder'));
//        }
    }

    public function sendMessage(Request $request)
    {
        try {
            $receiver = settings('mail_receiver');
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->surname = $request->surname;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->read_status = 0;
            $contact->message = $request->msg;
            $contact->save();
            $data = [
                'name' => $contact->name,
                'surname' => $contact->surname,
                'email' => $contact->email,
                'subject' => $contact->subject,
                'msg' => $contact->message
            ];
            Mail::send('backend.mail.send', $data, function ($message) use ($receiver) {
                $message->to($receiver);
                $message->subject(__('backend.you-have-new-message'));
            });
            alert()->success(__('messages.success'));
            return redirect(route('frontend.contact-us-page'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('frontend.contact-us-page'));
        }
    }
}

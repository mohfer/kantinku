<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handleXenditCallback(Request $request)
    {
        $invoiceId = $request->id;
        $status = $request->status;

        $payment = Payment::where('xendit_invoice_id', $invoiceId)->first();

        if ($payment) {
            $payment->update([
                'status' => $status === 'PAID' ? 'PAID' : 'FAILED',
                'paid_at' => $status === 'PAID' ? now() : null,
            ]);

            $payment->order->update([
                'order_status' => $status === 'PAID' ? 'PENDING' : 'FAILED',
                'payment_status' => $status === 'PAID' ? 'PAID' : 'FAILED',
            ]);
        }

        return response()->json(['success' => true]);
    }
}

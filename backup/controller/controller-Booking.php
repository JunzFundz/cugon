<?php

class BookingHandler extends Booking
{
    protected $users_id;
    protected $res_number;
    protected $booking_email;
    protected $numAdults;
    protected $numChild;
    protected $date;
    protected $payment;
    protected $status;

    public function __construct($users_id, $res_number, $booking_email, $numAdults, $numChild, $date, $payment, $status)
    {
        $this->users_id = $users_id;
        $this->res_number =  $res_number;
        $this->booking_email = $booking_email;
        $this->numAdults =  $numAdults;
        $this->numChild =  $numChild;
        $this->date = $date;
        $this->payment = $payment;
        $this->status = $status;
    }


}

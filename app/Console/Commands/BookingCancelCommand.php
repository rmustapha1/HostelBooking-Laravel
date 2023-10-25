<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\Room;

class BookingCancelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:cancel {bookingId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel a booking';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Find bookings with 'Reserved' status that are older than 24 hours
        $bookings = Booking::where('status', 'Reserved')
            ->where('created_at', '<=', now()->subHours(24))
            ->get();

        foreach ($bookings as $booking) {
            // Cancel each booking
            $booking->update(['status' => 'Canceled']);
            $this->info('Booking ' . $booking->id . ' has been canceled.');

            // Increase available slots for each room
            $this->increaseAvailableSlots($booking->room_id);
        }
    }


    protected function increaseAvailableSlots($room_id)
    {
        $room = Room::find($room_id);
        if ($room) {
            $room->increment('available_slots');
            $this->info('Available slots for the room have been increased.');
        }
    }
}

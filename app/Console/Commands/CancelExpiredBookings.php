<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CancelExpiredBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:cancel-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel expired bookings and update available slots';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->info('Cancelling expired bookings...');
        $this->info('Updating available slots...');
        // Get the current timestamp
        $currentTime = now();

        // Find and cancel expired bookings
        DB::table('bookings')
            ->where('status', 'Reserved')
            ->where('created_at', '<=', $currentTime->subHours(24))
            ->update(['status' => 'Canceled']);

        // Update available_slots in the room table
        DB::table('rooms')
            ->join('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->where('bookings.status', 'Canceled')
            ->increment('rooms.available_slots');
        $this->info('Expired bookings cancelled and available slots updated.');
    }
}

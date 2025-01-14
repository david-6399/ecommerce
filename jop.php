<?
namespace App\Jobs;

use App\Models\Room;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookRoom implements ShouldQueue
{
    protected $roomId, $userId;

    public function __construct($roomId, $userId)
    {
        $this->roomId = $roomId;
        $this->userId = $userId;
    }

    public function handle()
    {
        $room = Room::lockForUpdate()->find($this->roomId);
        
        if ($room && $room->is_available) {
            $room->is_available = false;
            $room->save();

            // Add booking record
            Booking::create([
                'room_id' => $this->roomId,
                'user_id' => $this->userId,
            ]);
        } else {
            throw new \Exception("Room is already booked.");
        }
    }
}

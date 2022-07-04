<?

namespace App\Providers\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class changePasswordService {
    public static function update($request, $id) {
        $user              = User::find($id) -> first();
        $oldPassword       = $request['old_password'];
        $newPassword = Hash::make($request['new_password']);
        $updateNewPassword = [
            'password' => $newPassword
        ];

        if(Hash::check($oldPassword, $user -> password)) {
            User:: find($id) -> update($updateNewPassword);
            return 'hello';
        } else {
            return redirect() -> route('change-password.edit', $user -> id) -> with(['UpdateFailed' => 'Updated Failed']);
        }
    }
}

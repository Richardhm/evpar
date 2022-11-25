<?php
    namespace App\Models\Traits;
    use Illuminate\Support\Facades\DB;
    trait UserACLTrait
    {
        public function isAdmin()
        {   
            $admins = DB::select("SELECT * FROM users WHERE admin = ?",[1]);
            $emails = [];
            foreach($admins as $a) {
                array_push($emails,$a->email);
            }
            
            return in_array($this->email,$emails);   
        }




    }
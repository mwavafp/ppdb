<?php


namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagihanAdmin extends Controller
{
    public function showData(){
        $all_data=DB::table('users')
                    ->join('pembayaran','users.id_user','=','pembayaran.id_user')
                    ->join('user_unit_pendidikan','users.id_user','=','user_unit_pendidikan.id_user')
                    ->join('kelas','user_unit_pendidikan.id_kelas','=','kelas.id_kelas')
                    ->select('users.name','kelas.unt_pendidikan','pembayaran.byr_dft_ulang','pembayaran.status','jmlh_byr')
                    ->paginate(10);
                   

                    return view('admin.page.tagihan',compact(
                        'all_data'
                    ),['title'=>'test']);
                    
    }
}

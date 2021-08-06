<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Feeship;

class BackendDeliveryController extends Controller
{

    public function index()
    {
        $provinces = Provinces::orderBy('matp', 'ASC')->get();
    	$feeship = Feeship::orderBy('id', 'ASC')->paginate(5);

    	return view('backend.feeship.index', compact('feeship','provinces'));
    }

    // public function create(Request $request)
    // {
    // 	$provinces = Provinces::orderBy('matp', 'ASC')->get();


    // 	return view('backend.feeship.create', compact('provinces')); 
    // }

    public function select_delivery(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="provinces"){
                $select_province = Districts::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>__Chọn Quận / Huyện__</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name.'</option>';
                }

            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn Phường / Xã---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                }
            }
            echo $output;
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $feeship = new Feeship();
        $feeship->matp = $data['provinces'];
        $feeship->maqh = $data['districts'];
        $feeship->xaid = $data['wards'];
        $feeship->feeship = $data['feeship'];

        $feeship->save();
        
    }

    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->feeship = $fee_value;
        $fee_ship->save();
    }

    public function select_feeship(){
        $feeship = Feeship::orderby('id','DESC')->get();
        $output = '';
        $output .= '
        <div class="table-responsive">
            <table class="table header-border table-hover verticle-middle">
                <thead> 
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tỉnh / Thành phố</th>
                        <th scope="col">Quận / Huyện</th>
                        <th scope="col">Xã / Phường</th>
                        <th scope="col">Phí vận chuyển</th>
                    </tr>  
                </thread>
                <tbody>
                ';

                foreach($feeship as $key => $fee){

                $output.='
                    <tr>
                        <td>'.++$key.'</td>
                        <td>'.$fee->provinces->name.'</td>
                        <td>'.$fee->districts->name.'</td>
                        <td>'.$fee->wards->name.'</td>
                        <td contenteditable data-feeship_id="'.$fee->id.'" class="fee_feeship_edit">'.number_format($fee->feeship,0,',','.').'</td>
                    </tr>
                    ';
                }

                $output.='      
                </tbody>
                </table></div>
                ';

                echo $output;

        
    }
}

            
        


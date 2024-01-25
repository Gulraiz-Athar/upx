<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DataTables;

use App\AddressBook;

use App\Country;

use Validator;

use Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Shadow;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class AddressBookController extends Controller

{

    /**

     * Call AUth middleware for check login

     *

     * @return \Illuminate\Http\Response

     */





    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        return view('upx.addressbook.index');

    }



    /**

     * Get all agents using datatable ajax request

     *

     * @param \Illuminate\Http\Request $request

     * @return \Illuminate\Http\Response Datatable json for draw

     */

    public function getall(Request $request)

    {



        $addressbook = AddressBook::with('country');

        if (Auth::user()->role == 'agent') {

            $addressbook = $addressbook->where('created_by', Auth::user()->id);

        }

        $addressbook = $addressbook->orderby('name', 'asc')->get();



        return DataTables::of($addressbook)

            ->addColumn('action', function ($q) {

                return '<a data-addressbookid="' . $q->id . '" data-toggle="modal" data-target=".modal_edit_list" title="Edit Address Book" class="openform"><i class="fa fa-pencil"></i></a> | <a class="delete_address" title="Delete Address Book" data-id="' . $q->id . '"><i class="fa fa-trash"></i></a>';

            })

            ->addColumn('added_by', function ($q) {

                return $q->addedby->name . ' ' . $q->addedby->lastname;

            })

            ->addColumn('country', function ($q) {

                return $q->country->name;

            })

            ->addIndexColumn()

            ->rawColumns(['status', 'action'])->make(true);

    }


/**
     * download excel file.
     *
     * @return \Illuminate\Http\file
     */
     public function download()
    {
        $addressbook = AddressBook::with('country','addedby');
        if (Auth::user()->role == 'agent') {
            $addressbook = $addressbook->where('created_by', Auth::user()->id);
        }
        $addressbook = $addressbook->orderby('name', 'asc')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Name');
        $sheet->getColumnDimension('A')->setAutoSize(true); 
        $sheet->getStyle('A1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');

        $sheet->setCellValue('B1', 'Company');
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getStyle('B1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');

        $sheet->setCellValue('C1', 'Address1');
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getStyle('C1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');
      
        $sheet->setCellValue('D1', 'Address2');
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getStyle('D1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');
        
        $sheet->setCellValue('E1', 'Address3');
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getStyle('E1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');

        $sheet->setCellValue('F1', 'City');
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getStyle('F1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');

        $sheet->setCellValue('G1', 'State');
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getStyle('G1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');

        $sheet->setCellValue('H1', 'Zip');
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getStyle('H1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');

        $sheet->setCellValue('I1', 'Country');
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getStyle('I1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');

        $sheet->setCellValue('J1', 'Email');
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getStyle('J1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('J1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');
        
        $sheet->setCellValue('K1', 'Telephone');
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getStyle('K1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('K1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');
        
        if(auth()->user()->role == 'admin'){
            $sheet->setCellValue('L1', 'Type');
            $sheet->getColumnDimension('L')->setAutoSize(true);
            $sheet->getStyle('L1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
            $sheet->getStyle('L1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');
            
            $sheet->setCellValue('M1', 'Added By');
            $sheet->getColumnDimension('M')->setAutoSize(true);
            $sheet->getStyle('M1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
            $sheet->getStyle('M1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('006400');
        }

        // $sheet->freezePaneByColumnAndRow(3, 2);
        if (!empty($addressbook)) {
            $i = 2;
            foreach ($addressbook as $book) {
                $sheet->setCellValue('A' . $i, $book->name);
                $sheet->setCellValue('B' . $i, $book->company);
                $sheet->setCellValue('C' . $i, $book->address1);
                $sheet->setCellValue('D' . $i, $book->address2);
                $sheet->setCellValue('E' . $i, $book->address3);
                $sheet->setCellValue('F' . $i, $book->city);
                $sheet->setCellValue('G' . $i, $book->state);
                $sheet->setCellValue('H' . $i, $book->postalcode);
                $sheet->setCellValue('I' . $i, $book->country->name);
                $sheet->setCellValue('J' . $i, $book->email);
                $sheet->setCellValue('K' . $i, $book->phone_number);
                if(auth()->user()->role == 'admin'){
                    $sheet->setCellValue('L' . $i, $book->type);
                    $sheet->setCellValue('M' . $i, $book->addedby->name.' '.$book->addedby->lastname);
                }
                $i++;
            }
        }
        $date = 'Address_book_'.date('d/m/Y', time());
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$date.'.xlsx"');
        $writer->save("php://output");
       
    }
    
    /**

     * Get model for add edit addressbook

     *

     * @param \Illuminate\Http\Request $request

     * @return \Illuminate\Http\Response

     */

    public function getmodel(Request $request)

    {

        $countries = Country::get();

        $addressbook = array();

        if (isset($request->addressbookid) && $request->addressbookid != '') {

            $addressbook = AddressBook::whereId($request->addressbookid)->first();

        }

        return view('upx.addressbook.modelopen', compact('addressbook', 'countries'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param \Illuminate\Http\Request $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $input = $request->all();

        $rules = array(

            'name' => "required|max:30",

            'company' => 'max:30',

            'address1' => 'required',

            'city' => 'required|string',

            'postalcode' => 'required',

            'country_id' => 'required|exists:countries,id',

            'phone_number' => 'numeric|nullable'



        );



        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            $arr = array("status" => 400, "msg" => $validator->errors()->first(), "result" => array());

        } else {



            try {

                $return = array();



                if (isset($request->addressbookid) && $request->addressbookid != '') {

                    AddressBook::find($request->addressbookid)->update($input);

                    $msg = 'AddressBook Updated Successfully.';



                } else {

                    $input['created_by'] = Auth::user()->id;

                    $addressbook = new AddressBook;

                    $addressbook->create($input);

                    $msg = 'Product Added Successfully.';



                }



                $arr = array("status" => 200, "msg" => $msg);

            } catch (\Illuminate\Database\QueryException $ex) {

                $msg = $ex->getMessage();

                if (isset($ex->errorInfo[2])) {

                    $msg = $ex->errorInfo[2];

                }



                $arr = array("status" => 400, "msg" => $msg, "result" => array());

            } catch (Exception $ex) {

                $msg = $ex->getMessage();

                if (isset($ex->errorInfo[2])) {

                    $msg = $ex->errorInfo[2];

                }



                $arr = array("status" => 400, "msg" => $msg, "result" => array());

            }

        }



        return \Response::json($arr);

    }





    public function destroy($id)

    {

        try {

            AddressBook::find($id)->delete();

            $arr = array("status" => 200, "msg" => 'Successfully deleted.');

        } catch (\Illuminate\Database\QueryException $ex) {

            $msg = $ex->getMessage();

            if (isset($ex->errorInfo[2])) {

                $msg = $ex->errorInfo[2];

            }

            $arr = array("status" => 400, "msg" => $msg, "result" => array());

        } catch (Exception $ex) {

            $msg = $ex->getMessage();

            if (isset($ex->errorInfo[2])) {

                $msg = $ex->errorInfo[2];

            }

            $arr = array("status" => 400, "msg" => $msg, "result" => array());

        }

        return \Response::json($arr);

    }

}


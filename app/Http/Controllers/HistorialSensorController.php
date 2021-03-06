<?php

namespace App\Http\Controllers;

use App\HistorialSensor;
use App\Sensor;
use Illuminate\Http\Request;

class HistorialSensorController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
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
    public function chart($id)
    {
        //
        $historialsensor = HistorialSensor::find($id);
        //dd($historialsensors);
        //dd($historialsensors->vol_1*1);
        $back1[0][0]= "0";
        $back1[0][1]= "#FFF"; 
        $back1[1][0]= "1";
        $back1[1][1]= "#333"; 
        $back2[0][0]= "0";
        $back2[0][1]= "#333";
        $back2[1][0]= "1";
        $back2[1][1]= "#FFF"; 
        $vol1 = \Chart::title(['text' => 'Voltaje(1)',])
                        ->chart(['type'     => 'gauge','renderTo' => 'vol1',
                                 'plotBackgroundColor' => null,
                                 'plotBackgroundImage' => null,
                                 'plotBorderWidth' => 0,
                                 'plotShadow' => false,])
                        ->credits(['enabled' => false])
                        ->pane(['startAngle' => -150,
                                'endAngle' => 150,
                                'background' => [['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back1
                                                                      ],
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '109%',],
                                                 ['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back2,
                                                                      ],
                                                  'borderWidth' => 1,
                                                  'outerRadius' => '107%',],
                                                  ['' => ''],
                                                  ['backgroundColor'=> '#DDD',
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '105%',
                                                  'innerRadius' => '103%',]], 

                        ])
                        ->yaxis(['min' => 0,
                                 'max' => 5.2,
                                 'minorTickInterval' => 'auto' ,
                                 'minorTickWidth' => 1,
                                 'minorTickLength' => 5,
                                 'minorTickPosition' => 'inside',
                                 'minorTickColor' => '#666',
                                 'tickPixelInterval' => 30,
                                 'tickWidth' => 2,
                                 'tickPosition' => 'inside',
                                 'tickLength' => 5,
                                 'tickColor' => '#666',
                                 'labels' => ['step' => 2,
                                              'rotation' => 'auto',],
                                 'title' => ['text' => 'Volt/DC',],
                                 'plotBands' => [['from' => 0,
                                                 'to' => 3,
                                                 'color' => '#55BF3B',],
                                                 ['from' => 3,
                                                 'to' => 4,
                                                 'color' => '#DDDF0D',],
                                                 ['from' => 4,
                                                 'to' => 5.2,
                                                 'color' => '#DF5353',]],
                                    ])
                         ->series([['name'  => 'Valor',
                                   'data'  => [$historialsensor->vol_1*1],
                                   'tooltip' => ['valueSuffix' => '-Volt/DC'],]])
                        ->display();
    $vol2 = \Chart::title(['text' => 'Voltaje(2)',])
                        ->chart(['type'     => 'gauge','renderTo' => 'vol2',
                                 'plotBackgroundColor' => null,
                                 'plotBackgroundImage' => null,
                                 'plotBorderWidth' => 0,
                                 'plotShadow' => false,])
                        ->credits(['enabled' => false])
                        ->pane(['startAngle' => -150,
                                'endAngle' => 150,
                                'background' => [['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back1
                                                                      ],
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '109%',],
                                                 ['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back2,
                                                                      ],
                                                  'borderWidth' => 1,
                                                  'outerRadius' => '107%',],
                                                  ['' => ''],
                                                  ['backgroundColor'=> '#DDD',
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '105%',
                                                  'innerRadius' => '103%',]], 

                        ])
                        ->yaxis(['min' => 0,
                                 'max' => 5.2,
                                 'minorTickInterval' => 'auto' ,
                                 'minorTickWidth' => 1,
                                 'minorTickLength' => 5,
                                 'minorTickPosition' => 'inside',
                                 'minorTickColor' => '#666',
                                 'tickPixelInterval' => 30,
                                 'tickWidth' => 2,
                                 'tickPosition' => 'inside',
                                 'tickLength' => 5,
                                 'tickColor' => '#666',
                                 'labels' => ['step' => 2,
                                              'rotation' => 'auto',],
                                 'title' => ['text' => 'Volt/DC',],
                                 'plotBands' => [['from' => 0,
                                                 'to' => 3,
                                                 'color' => '#55BF3B',],
                                                 ['from' => 3,
                                                 'to' => 4,
                                                 'color' => '#DDDF0D',],
                                                 ['from' => 4,
                                                 'to' => 5.2,
                                                 'color' => '#DF5353',]],
                                    ])
                         ->series([['name'  => 'Valor',
                                   'data'  => [$historialsensor->vol_2*1],
                                   'tooltip' => ['valueSuffix' => '-Volt/DC'],]])
                        ->display();
    
    $vol3 = \Chart::title(['text' => 'Voltaje(3)',])
                        ->chart(['type'     => 'gauge','renderTo' => 'vol3',
                                 'plotBackgroundColor' => null,
                                 'plotBackgroundImage' => null,
                                 'plotBorderWidth' => 0,
                                 'plotShadow' => false,])
                        ->credits(['enabled' => false])
                        ->pane(['startAngle' => -150,
                                'endAngle' => 150,
                                'background' => [['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back1
                                                                      ],
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '109%',],
                                                 ['backgroundColor'=> ['linearGradient' => ['x1' => 0,
                                                                                            'y1' => 0,
                                                                                            'x2' => 0,
                                                                                            'y2' => 1,],
                                                                       'stops'         => $back2,
                                                                      ],
                                                  'borderWidth' => 1,
                                                  'outerRadius' => '107%',],
                                                  ['' => ''],
                                                  ['backgroundColor'=> '#DDD',
                                                  'borderWidth' => 0,
                                                  'outerRadius' => '105%',
                                                  'innerRadius' => '103%',]], 

                        ])
                        ->yaxis(['min' => 0,
                                 'max' => 5.2,
                                 'minorTickInterval' => 'auto' ,
                                 'minorTickWidth' => 1,
                                 'minorTickLength' => 5,
                                 'minorTickPosition' => 'inside',
                                 'minorTickColor' => '#666',
                                 'tickPixelInterval' => 30,
                                 'tickWidth' => 2,
                                 'tickPosition' => 'inside',
                                 'tickLength' => 5,
                                 'tickColor' => '#666',
                                 'labels' => ['step' => 2,
                                              'rotation' => 'auto',],
                                 'title' => ['text' => 'Volt/DC',],
                                 'plotBands' => [['from' => 0,
                                                 'to' => 3,
                                                 'color' => '#55BF3B',],
                                                 ['from' => 3,
                                                 'to' => 4,
                                                 'color' => '#DDDF0D',],
                                                 ['from' => 4,
                                                 'to' => 5.2,
                                                 'color' => '#DF5353',]],
                                    ])
                         ->series([['name'  => 'Valor',
                                   'data'  => [$historialsensor->vol_3*1],
                                   'tooltip' => ['valueSuffix' => '-Volt/DC'],]])
                        ->display();
                       
    //return view('module.historialsensor.chart', ['vol1' => $vol1,]);
    return view('module.historialsensor.chart')->with('vol1',$vol1)
                                          ->with('vol2',$vol2)
                                          ->with('vol3',$vol3)
                                          ->with('historialsensor',$historialsensor);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $historialsensors = HistorialSensor::all();
        //return view('module.historialsensor.index')->with('historialsensors',$historialsensors);
        return view('module.historialsensor.index',compact('historialsensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sensors = Sensor::all();
        return view('module.historialsensor.create',compact('sensors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sensor_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'passw'=>'required|string|max:100',
            'vol_1'=>'required|string|max:100',
            'vol_2'=>'required|string|max:100',
            'vol_3'=>'required|string|max:100',
            'door_1'=>'required|string|max:100',
            'door_2'=>'required|string|max:100',
            'door_3'=>'required|string|max:100',
            'door_4'=>'required|string|max:100',
            'rlay_1'=>'required|string|max:100',
            'rlay_2'=>'required|string|max:100',
            'rlay_3'=>'required|string|max:100',
            'rlay_4'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);
        $historialsensor = new HistorialSensor([
            'sensor_id' => $request->get('sensor_id'),
            'num_serie' => $request->get('num_serie'),
            'passw' => $request->get('passw'),
            'vol_1' => $request->get('vol_1'),
            'vol_2' => $request->get('vol_2'),
            'vol_3' => $request->get('vol_3'),
            'door_1' => $request->get('door_1'),
            'door_2' => $request->get('door_2'),
            'door_3' => $request->get('door_3'),
            'door_4' => $request->get('door_4'),
            'rlay_1' => $request->get('rlay_1'),
            'rlay_2' => $request->get('rlay_2'),
            'rlay_3' => $request->get('rlay_3'),
            'rlay_4' => $request->get('rlay_4'),
            'text' => $request->get('text')
            ]);
        $historialsensor->save();
        //return redirect(/sensor)->with('success','Historial sensor generado Satisfactoriamente');
        toastr()->success('Historial sensor creado');
        return redirect()->route('historialsensor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function show(HistorialSensor $historialsensor)
    {
        //
        return view('module.historialsensor.show', compact('historialsensor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function edit(HistorialSensor $historialsensor)
    {
        //
        $sensors = Sensor::all();
        return view('module.historialsensor.edit',compact('historialsensor','sensors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistorialSensor $historialsensor)
    {
        //
        $request->validate([
            'sensor_id'=>'required|string|max:100',
            'num_serie'=>'required|string|max:100',
            'passw'=>'required|string|max:100',
            'vol_1'=>'required|string|max:100',
            'vol_2'=>'required|string|max:100',
            'vol_3'=>'required|string|max:100',
            'door_1'=>'required|string|max:100',
            'door_2'=>'required|string|max:100',
            'door_3'=>'required|string|max:100',
            'door_4'=>'required|string|max:100',
            'rlay_1'=>'required|string|max:100',
            'rlay_2'=>'required|string|max:100',
            'rlay_3'=>'required|string|max:100',
            'rlay_4'=>'required|string|max:100',
            'text'=>'required|string|max:100',
        ]);
        $historialsensor_request = $request->all();
        $historialsensor->update($historialsensor_request);
        toastr()->warning('Historial sensor actualizado');
        return redirect()->route('historialsensor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistorialSensor  $historialSensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistorialSensor $historialsensor)
    {
        //
        $historialsensor->delete();
        //return reditec('/historialsensor'->with('success','Historial sensor Eliminado Satisfactoriamente'));
        toastr()->error('Historial sensor eliminado');
        return redirect()->route('historialsensor.index');
    }
}

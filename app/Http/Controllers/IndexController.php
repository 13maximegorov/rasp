<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;
use SoapClient;
use DateTime;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function teachers() {
        ini_set("soap.wsdl_cache_enabled", "0");
        $client = new SoapClient("http://77.94.125.2:48666/collegework/ws/shedule?wsdl", ['location' => 'http://77.94.125.2:48666/collegework/ws/shedule', 'login' => "WS", 'password' => "123", 'exceptions' => 1]);
        $teachers = $client->GetTeacher();
        $resultTeachers = $teachers->return;
        $TeachersArray = (array)$resultTeachers;
        $TeachersArray = $TeachersArray['RowsOfTeacher'];
        $teachersList = [];
        foreach ($TeachersArray as $k => $v) {
            array_push($teachersList, $v->TeacherName);
        }
        return view('teachers', ['teachers' => $teachersList]);
    }

    public function students() {
        ini_set("soap.wsdl_cache_enabled", "0");
        $client = new SoapClient("http://77.94.125.2:48666/collegework/ws/shedule?wsdl", ['location' => 'http://77.94.125.2:48666/collegework/ws/shedule', 'login' => "WS", 'password' => "123", 'exceptions' => 1]);
        $groups = $client->GetGroup();
        $resultGroups = $groups->return;
        $GroupsArray = (array)$resultGroups;
        $GroupsArray = $GroupsArray['RowsOfGroup'];
        $groupsList = [];
        foreach ($GroupsArray as $k => $v) {
            array_push($groupsList, $v->Group);
        }
        return view('students', ['groups' => $groupsList]);
    }

    public function getGroupShedule(Request $request) {
        $this->validate($request, [
            'group' => 'required',
            'date' => 'required'
        ]);

        Session::flush();
        ini_set("soap.wsdl_cache_enabled", "0");
        $client = new SoapClient("http://77.94.125.2:48666/collegework/ws/shedule?wsdl", ['location' => 'http://77.94.125.2:48666/collegework/ws/shedule', 'login' => "WS", 'password' => "123", 'exceptions' => 0]);
        $params['Group'] = $request->group;
        $params['DateShedule'] = $request->date;
        $p['DateShedule'] = $request->date;

        $shedule = $client->GetShedule($params)->return;

        $sheduleArray = (array) $shedule;

        if (!empty($sheduleArray)) {
            Session::put('sheduleG', $sheduleArray['Rows']);
        } else {
            Session::put('messageG', 'Расписания нет');
        }

        if(!is_soap_fault($times = $client->GetTime($p))) {
            $time = (array)$times->return;
            if (array_key_exists('RowsOfTime', $time)) {
                $time = $time['RowsOfTime'];
                if ($time[0]->NumberLesson == 1) {
                    array_unshift($time, NULL);
                    unset($time[0]);
                }
                // из вида 2019-10-17T8:00:00 в нормальное 8:00
                foreach ($time as $v) {
                    $b = $v->Begin;
                    $e = $v->End;
                    $datetime1 = new DateTime($b);
                    $datetime2 = new DateTime($e);
                    $times1 = $datetime1->format('H:i');
                    $times2 = $datetime2->format('H:i');
                    $v->Begin = $times1;
                    $v->End = $times2;
                }
            }
        }

        $datetime = new DateTime($request->date);
        $times1 = $datetime->format('d.m.Y');
        $params['DateShedule1'] = $times1;

        if (isset($time)) {
            Session::put('time', $time);
        }

        Session::put('infoGroup', $params);
        Session::save();
        return redirect('/result-student');
    }

    public function resultStudent() {
        return view('result_student');
    }

    public function getTeacherShedule(Request $request) {
        $this->validate($request, [
            'teacher' => 'required',
            'date' => 'required'
        ]);

        Session::flush();
        ini_set("soap.wsdl_cache_enabled", "0");
        $client = new SoapClient("http://77.94.125.2:48666/collegework/ws/shedule?wsdl", ['location' => 'http://77.94.125.2:48666/collegework/ws/shedule', 'login' => "WS", 'password' => "123", 'exceptions' => 0]);
        $params['Teacher'] = $request->teacher;
        $params['DateShedule'] = $request->date;
        $p['DateShedule'] = $request->date;

        $shedule = $client->GetSheduleTeacher($params)->return;

        $sheduleArray = (array) $shedule;
        if (!empty($sheduleArray)) {
            Session::put('sheduleT', $sheduleArray['Rows']);
        } else {
            Session::put('messageT', 'Расписания нет');
        }

        if(!is_soap_fault($times = $client->GetTime($p))) {
            $time = (array)$times->return;
            if (array_key_exists('RowsOfTime', $time)) {
                $time = $time['RowsOfTime'];
                if ($time[0]->NumberLesson == 1) {
                    array_unshift($time, NULL);
                    unset($time[0]);
                }
                // из вида 2019-10-17T8:00:00 в нормальное 8:00
                foreach ($time as $v) {
                    $b = $v->Begin;
                    $e = $v->End;
                    $datetime1 = new DateTime($b);
                    $datetime2 = new DateTime($e);
                    $times1 = $datetime1->format('H:i');
                    $times2 = $datetime2->format('H:i');
                    $v->Begin = $times1;
                    $v->End = $times2;
                }
            }
        }

        $datetime = new DateTime($request->date);
        $times1 = $datetime->format('d.m.Y');
        $params['DateShedule1'] = $times1;

        if (isset($time)) {
            Session::put('timeT', $time);
        }
        Session::put('infoTeacher', $params);
        Session::save();
        return redirect('/result-teacher');
    }

    public function resultTeacher() {
        return view('result_teacher');
    }
}

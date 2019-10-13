<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SoapClient;

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
        $client = new SoapClient("http://77.94.125.2:48666/collegework/ws/shedule?wsdl", ['location' => 'http://77.94.125.2:48666/collegework/ws/shedule', 'login' => "WS", 'password' => "123", 'exceptions' => 1]);
        $params['Group'] = $request->group;
        $params['DateShedule'] = $request->date;
        $shedule = $client->GetShedule($params)->return;
        $sheduleArray = (array) $shedule;
        if (!empty($sheduleArray)) {
            Session::put('sheduleG', $sheduleArray['Rows']);
        } else {
            Session::put('messageG', 'Расписания нет');
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
        $client = new SoapClient("http://77.94.125.2:48666/collegework/ws/shedule?wsdl", ['location' => 'http://77.94.125.2:48666/collegework/ws/shedule', 'login' => "WS", 'password' => "123", 'exceptions' => 1]);
        $params['Teacher'] = $request->teacher;
        $params['DateShedule'] = $request->date;
        $shedule = $client->GetSheduleTeacher($params)->return;
        $sheduleArray = (array) $shedule;
        if (!empty($sheduleArray)) {
            Session::put('sheduleT', $sheduleArray['Rows']);
        } else {
            Session::put('messageT', 'Расписания нет');
        }
        Session::put('infoTeacher', $params);
        Session::save();
        return redirect('/result-teacher');
    }

    public function resultTeacher() {
        return view('result_teacher');
    }
}

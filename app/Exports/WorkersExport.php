<?php

namespace App\Exports;

use App\Department;
use App\Worker;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorkersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function headings(): array
    {
        return [
            'القائم بالتسجيل',
            'نوع التسجيل',
            'رقم المشترك',
            'الرقم البريدي',
            'بداية قراءة الكيبل بالامتار',
            'القراءة على الهوك',
            'نهاية القراءة',
            'طول الكيبل الخارجي',
            'طول الكيبل كامل',
            'رقم المنفذ',
            'رقم الروت',
            'اشارة المنفذ',
            'اشارة البوكس المنزلى',
            'اشارة ماقبل السبلتر',
            'اشارة المنافذ كمتوسط',
            'ترنش',
            'مواسير حرارية PVC',
            'pvc total',
            'السحابات',
            'مسار مغلق',
            'وقت التسجيل',
            'category',
            'المبلغ',
        ];
    }
    public function collection()
    {
        $departments = Department::where('created_at', '>=', $this->from)->where('created_at', '<=', $this->to)->get();
        $array = [];
        foreach ($departments as $department) {
            if($department->type == "0")
            {
                $type = "منزل شعرة واحدة";
            }elseif($department->type == "1")
            {
                $type = "منزل 4 شعرات";
            }elseif($department->type == "2")
            {
                $type = "بناية 4 شعرات";
            }else
            {
                $type = "(عمل جانبي) ".$department->type;
            }

            if($department->use_spliter == 1)
            {
                $spliter = "نعم";
            }else
            {
                $spliter = "";
            }
            if($department->type != "0")
            {
                if($department->tranch +$department->pvc >= 5)
                {
                    $cate = "3";
                }else
                {
                    $cate = "2";
                }
            }else
            {
                $cate="";
            }
            //check if pvc and tranch
            if($department->type =="1" or $department->type =="2")
            {
                if(($department->tranch + $department->pvc) > 20)
                {
                    $amount = ($department->tranch + $department->pvc) - 20;
                }else
                {
                    $amount = "";
                }
            }elseif($department->type =="0")
            {
                $amount = ($department->tranch + $department->pvc);
            }else
            {
                $amount = "";
            }
            
            //elemnate house "0"
            if($department->type =="1" or $department->type =="2")
            {
                $outer_cable = strval(abs($department->cable_start - $department->hook));
            }else
            {
                $outer_cable = "";
            }
            $array[] = [
                'القائم بالتسجيل' => $department->worker->name,
                'نوع التسجيل' => $type,
                'رقم المشترك' => $department->sub_num,
                'الرقم البريدي' => $department->post_code,
                'بداية قراءة الكيبل بالامتار' => $department->cable_start,
                'القراءة على الهوك' => $department->hook,
                'نهاية القراءة' => $department->end_read,
                'طول الكيبل الخارجي' => $outer_cable,
                'طول الكيبل كامل' => strval(abs($department->cable_start - $department->end_read)),
                'رقم المنفذ' => $department->port_num,
                'رقم الروت' => $department->root_num,
                'اشارة المنفذ' => $department->port_signal,
                'اشارة البوكس المنزلى' => $department->box_signal,
                'اشارة ماقبل السبلتر' => $department->pre_spliter_signal,
                'اشارة المنافذ كمتوسط' => $department->port_signal_m,
                'ترنش' => strval($department->tranch),
                'مواسير حرارية PVC' => strval($department->pvc),
                'pvc total' => $amount,
                'السحابات' => strval($department->sharshor),
                'مسار مغلق' => $spliter,
                'وقت التسجيل' => $department->created_at,
                'category' => $cate,
                'المبلغ' => $department->total,

            ];
        }
        return collect($array);
    }
}

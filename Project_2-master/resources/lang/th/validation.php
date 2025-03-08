<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines (ภาษาไทย)
    |--------------------------------------------------------------------------
    |
    | บรรทัดข้อความด้านล่างนี้เป็นข้อความผิดพลาดเริ่มต้นที่ใช้โดยคลาส Validator
    | บางกฎมีหลายเวอร์ชัน เช่น กฎขนาด โปรดปรับแต่งข้อความเหล่านี้ตามที่ต้องการ
    |
    */

    'accepted'             => ':attribute ต้องได้รับการยอมรับ',
    'active_url'           => ':attribute ไม่ใช่ URL ที่ถูกต้อง',
    'after'                => ':attribute ต้องเป็นวันที่หลัง :date',
    'after_or_equal'       => ':attribute ต้องเป็นวันที่หลังหรือเท่ากับ :date',
    'alpha'                => ':attribute ต้องประกอบด้วยตัวอักษรเท่านั้น',
    'alpha_dash'           => ':attribute ต้องประกอบด้วยตัวอักษร ตัวเลข ขีดกลาง และขีดล่างเท่านั้น',
    'alpha_num'            => ':attribute ต้องประกอบด้วยตัวอักษรและตัวเลขเท่านั้น',
    'array'                => ':attribute ต้องเป็นอาร์เรย์',
    'before'               => ':attribute ต้องเป็นวันที่ก่อน :date',
    'before_or_equal'      => ':attribute ต้องเป็นวันที่ก่อนหรือเท่ากับ :date',
    'between'              => [
        'numeric' => ':attribute ต้องอยู่ระหว่าง :min และ :max',
        'file'    => ':attribute ต้องมีขนาดระหว่าง :min ถึง :max กิโลไบต์',
        'string'  => ':attribute ต้องมีความยาวระหว่าง :min ถึง :max ตัวอักษร',
        'array'   => ':attribute ต้องมีจำนวนรายการระหว่าง :min ถึง :max รายการ',
    ],
    'boolean'              => 'ฟิลด์ :attribute ต้องเป็นจริงหรือเท็จ',
    'confirmed'            => 'การยืนยัน :attribute ไม่ตรงกัน',
    'date'                 => ':attribute ไม่ใช่วันที่ที่ถูกต้อง',
    'date_equals'          => ':attribute ต้องเป็นวันที่เท่ากับ :date',
    'date_format'          => ':attribute ไม่ตรงกับรูปแบบ :format',
    'different'            => ':attribute และ :other ต้องไม่เหมือนกัน',
    'digits'               => ':attribute ต้องเป็นตัวเลข :digits หลัก',
    'digits_between'       => ':attribute ต้องเป็นตัวเลขระหว่าง :min ถึง :max หลัก',
    'dimensions'           => ':attribute มีขนาดรูปภาพไม่ถูกต้อง',
    'distinct'             => 'ฟิลด์ :attribute มีค่าที่ซ้ำกัน',
    'email'                => ':attribute ต้องเป็นที่อยู่อีเมลที่ถูกต้อง',
    'ends_with'            => ':attribute ต้องลงท้ายด้วยหนึ่งในสิ่งต่อไปนี้: :values',
    'exists'               => 'ตัวเลือก :attribute ไม่ถูกต้อง',
    'file'                 => ':attribute ต้องเป็นไฟล์',
    'filled'               => 'ฟิลด์ :attribute ต้องมีค่า',
    'gt'                   => [
        'numeric' => ':attribute ต้องมากกว่า :value',
        'file'    => ':attribute ต้องมีขนาดมากกว่า :value กิโลไบต์',
        'string'  => ':attribute ต้องมีความยาวมากกว่า :value ตัวอักษร',
        'array'   => ':attribute ต้องมีรายการมากกว่า :value รายการ',
    ],
    'gte'                  => [
        'numeric' => ':attribute ต้องมากกว่าหรือเท่ากับ :value',
        'file'    => ':attribute ต้องมีขนาดมากกว่าหรือเท่ากับ :value กิโลไบต์',
        'string'  => ':attribute ต้องมีความยาวมากกว่าหรือเท่ากับ :value ตัวอักษร',
        'array'   => ':attribute ต้องมีอย่างน้อย :value รายการ',
    ],
    'image'                => ':attribute ต้องเป็นรูปภาพ',
    'in'                   => 'ตัวเลือก :attribute ไม่ถูกต้อง',
    'in_array'             => 'ฟิลด์ :attribute ไม่มีอยู่ใน :other',
    'integer'              => ':attribute ต้องเป็นจำนวนเต็ม',
    'ip'                   => ':attribute ต้องเป็น IP address ที่ถูกต้อง',
    'ipv4'                 => ':attribute ต้องเป็น IPv4 address ที่ถูกต้อง',
    'ipv6'                 => ':attribute ต้องเป็น IPv6 address ที่ถูกต้อง',
    'json'                 => ':attribute ต้องเป็นสตริง JSON ที่ถูกต้อง',
    'lt'                   => [
        'numeric' => ':attribute ต้องน้อยกว่า :value',
        'file'    => ':attribute ต้องมีขนาดน้อยกว่า :value กิโลไบต์',
        'string'  => ':attribute ต้องมีความยาวน้อยกว่า :value ตัวอักษร',
        'array'   => ':attribute ต้องมีรายการน้อยกว่า :value รายการ',
    ],
    'lte'                  => [
        'numeric' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value',
        'file'    => ':attribute ต้องมีขนาดน้อยกว่าหรือเท่ากับ :value กิโลไบต์',
        'string'  => ':attribute ต้องมีความยาวน้อยกว่าหรือเท่ากับ :value ตัวอักษร',
        'array'   => ':attribute ต้องมีไม่เกิน :value รายการ',
    ],
    'max'                  => [
        'numeric' => ':attribute ต้องไม่มากกว่า :max',
        'file'    => ':attribute ต้องไม่เกิน :max กิโลไบต์',
        'string'  => ':attribute ต้องไม่เกิน :max ตัวอักษร',
        'array'   => ':attribute ต้องไม่เกิน :max รายการ',
    ],
    'mimes'                => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'mimetypes'            => ':attribute ต้องเป็นไฟล์ประเภท: :values',
    'min'                  => [
        'numeric' => ':attribute ต้องไม่น้อยกว่า :min',
        'file'    => ':attribute ต้องมีขนาดอย่างน้อย :min กิโลไบต์',
        'string'  => ':attribute ต้องมีความยาวอย่างน้อย :min ตัวอักษร',
        'array'   => ':attribute ต้องมีอย่างน้อย :min รายการ',
    ],
    'multiple_of'          => ':attribute ต้องเป็นผลคูณของ :value',
    'not_in'               => 'ตัวเลือก :attribute ไม่ถูกต้อง',
    'not_regex'            => 'รูปแบบ :attribute ไม่ถูกต้อง',
    'numeric'              => ':attribute ต้องเป็นตัวเลข',
    'password'             => 'รหัสผ่านไม่ถูกต้อง',
    'present'              => 'ฟิลด์ :attribute ต้องมีอยู่',
    'regex'                => 'รูปแบบ :attribute ไม่ถูกต้อง',
    'required'             => 'ฟิลด์ :attribute จำเป็นต้องกรอก',
    'required_if'          => 'ฟิลด์ :attribute จำเป็นต้องกรอกเมื่อ :other เป็น :value',
    'required_unless'      => 'ฟิลด์ :attribute จำเป็นต้องกรอกหาก :other ไม่อยู่ใน :values',
    'required_with'        => 'ฟิลด์ :attribute จำเป็นต้องกรอกเมื่อมี :values',
    'required_with_all'    => 'ฟิลด์ :attribute จำเป็นต้องกรอกเมื่อมี :values',
    'required_without'     => 'ฟิลด์ :attribute จำเป็นต้องกรอกเมื่อไม่มี :values',
    'required_without_all' => 'ฟิลด์ :attribute จำเป็นต้องกรอกเมื่อไม่มี :values เลย',
    'prohibited'           => 'ฟิลด์ :attribute ถูกห้ามใช้',
    'prohibited_if'        => 'ฟิลด์ :attribute ถูกห้ามใช้เมื่อ :other เป็น :value',
    'prohibited_unless'    => 'ฟิลด์ :attribute ถูกห้ามใช้หาก :other ไม่อยู่ใน :values',
    'same'                 => ':attribute และ :other ต้องตรงกัน',
    'size'                 => [
        'numeric' => ':attribute ต้องเท่ากับ :size',
        'file'    => ':attribute ต้องมีขนาดเท่ากับ :size กิโลไบต์',
        'string'  => ':attribute ต้องมีความยาวเท่ากับ :size ตัวอักษร',
        'array'   => ':attribute ต้องมี :size รายการ',
    ],
    'starts_with'          => ':attribute ต้องเริ่มต้นด้วยหนึ่งในสิ่งต่อไปนี้: :values',
    'string'               => ':attribute ต้องเป็นสตริง',
    'timezone'             => ':attribute ต้องเป็นโซนที่ถูกต้อง',
    'unique'               => ':attribute ถูกใช้งานไปแล้ว',
    'uploaded'             => 'การอัปโหลด :attribute ล้มเหลว',
    'url'                  => 'รูปแบบ :attribute ไม่ถูกต้อง',
    'uuid'                 => ':attribute ต้องเป็น UUID ที่ถูกต้อง',

    /*
    |--------------------------------------------------------------------------
    | ข้อความ Validation แบบกำหนดเอง (Custom Validation Language Lines) (ภาษาไทย)
    |--------------------------------------------------------------------------
    |
    | ที่นี่คุณสามารถกำหนดข้อความ validation เฉพาะสำหรับ attribute โดยใช้รูปแบบ
    | "attribute.rule" ในการตั้งชื่อข้อความเหล่านั้น
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | เปลี่ยนชื่อ attribute ให้เป็นชื่อที่อ่านง่ายขึ้น (Custom Validation Attributes) (ภาษาไทย)
    |--------------------------------------------------------------------------
    |
    | บรรทัดด้านล่างนี้ใช้สำหรับเปลี่ยนชื่อ attribute ให้เป็นชื่อที่อ่านง่ายขึ้น เช่น
    | "E-Mail Address" แทน "email"
    |
    */

    'attributes' => [],

];

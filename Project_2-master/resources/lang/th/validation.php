<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ข้อความตรวจสอบ (Validation Language Lines)
    |--------------------------------------------------------------------------
    |
    | ข้อความแสดงข้อผิดพลาดเริ่มต้นที่ใช้โดยคลาสตรวจสอบข้อมูล
    | บางกฎมีหลายเวอร์ชัน เช่น กฎเกี่ยวกับขนาด สามารถปรับแต่งข้อความเหล่านี้ได้ที่นี่
    |
    */

    'accepted' => ':attribute ต้องได้รับการยอมรับ.',
    'active_url' => ':attribute ไม่ใช่ URL ที่ถูกต้อง.',
    'after' => ':attribute ต้องเป็นวันที่หลังจาก :date.',
    'after_or_equal' => ':attribute ต้องเป็นวันที่หลังจากหรือเท่ากับ :date.',
    'alpha' => ':attribute ต้องประกอบด้วยตัวอักษรเท่านั้น.',
    'alpha_dash' => ':attribute ต้องประกอบด้วยตัวอักษร ตัวเลข ขีดกลาง และขีดล่างเท่านั้น.',
    'alpha_num' => ':attribute ต้องประกอบด้วยตัวอักษรและตัวเลขเท่านั้น.',
    'array' => ':attribute ต้องเป็นอาร์เรย์.',
    'before' => ':attribute ต้องเป็นวันที่ก่อน :date.',
    'before_or_equal' => ':attribute ต้องเป็นวันที่ก่อนหรือเท่ากับ :date.',
    'between' => [
        'numeric' => ':attribute ต้องอยู่ระหว่าง :min และ :max.',
        'file' => ':attribute ต้องมีขนาดระหว่าง :min และ :max กิโลไบต์.',
        'string' => ':attribute ต้องมีจำนวนตัวอักษรระหว่าง :min และ :max ตัว.',
        'array' => ':attribute ต้องมีรายการระหว่าง :min ถึง :max รายการ.',
    ],
    'boolean' => 'ฟิลด์ :attribute ต้องเป็นจริงหรือเท็จ.',
    'confirmed' => 'การยืนยัน :attribute ไม่ตรงกัน.',
    'date' => ':attribute ไม่ใช่วันที่ที่ถูกต้อง.',
    'date_equals' => ':attribute ต้องเป็นวันที่เท่ากับ :date.',
    'date_format' => ':attribute ไม่ตรงกับรูปแบบ :format.',
    'different' => ':attribute และ :other ต้องแตกต่างกัน.',
    'digits' => ':attribute ต้องเป็นตัวเลข :digits หลัก.',
    'digits_between' => ':attribute ต้องมีจำนวนหลักระหว่าง :min และ :max.',
    'dimensions' => ':attribute มีขนาดภาพที่ไม่ถูกต้อง.',
    'distinct' => 'ฟิลด์ :attribute มีค่าซ้ำกัน.',
    'email' => ':attribute ต้องเป็นที่อยู่อีเมลที่ถูกต้อง.',
    'ends_with' => ':attribute ต้องลงท้ายด้วยหนึ่งในสิ่งต่อไปนี้: :values.',
    'exists' => ':attribute ที่เลือกไม่ถูกต้อง.',
    'file' => ':attribute ต้องเป็นไฟล์.',
    'filled' => 'ฟิลด์ :attribute ต้องมีค่า.',
    'gt' => [
        'numeric' => ':attribute ต้องมากกว่า :value.',
        'file' => ':attribute ต้องมากกว่า :value กิโลไบต์.',
        'string' => ':attribute ต้องมีมากกว่า :value ตัวอักษร.',
        'array' => ':attribute ต้องมีมากกว่า :value รายการ.',
    ],
    'gte' => [
        'numeric' => ':attribute ต้องมากกว่าหรือเท่ากับ :value.',
        'file' => ':attribute ต้องมากกว่าหรือเท่ากับ :value กิโลไบต์.',
        'string' => ':attribute ต้องมีอย่างน้อย :value ตัวอักษร.',
        'array' => ':attribute ต้องมีอย่างน้อย :value รายการ.',
    ],
    'image' => ':attribute ต้องเป็นรูปภาพ.',
    'in' => ':attribute ที่เลือกไม่ถูกต้อง.',
    'in_array' => 'ฟิลด์ :attribute ไม่มีใน :other.',
    'integer' => ':attribute ต้องเป็นจำนวนเต็ม.',
    'ip' => ':attribute ต้องเป็นที่อยู่ IP ที่ถูกต้อง.',
    'ipv4' => ':attribute ต้องเป็นที่อยู่ IPv4 ที่ถูกต้อง.',
    'ipv6' => ':attribute ต้องเป็นที่อยู่ IPv6 ที่ถูกต้อง.',
    'json' => ':attribute ต้องเป็นสตริง JSON ที่ถูกต้อง.',
    'lt' => [
        'numeric' => ':attribute ต้องน้อยกว่า :value.',
        'file' => ':attribute ต้องน้อยกว่า :value กิโลไบต์.',
        'string' => ':attribute ต้องมีน้อยกว่า :value ตัวอักษร.',
        'array' => ':attribute ต้องมีน้อยกว่า :value รายการ.',
    ],
    'lte' => [
        'numeric' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value.',
        'file' => ':attribute ต้องน้อยกว่าหรือเท่ากับ :value กิโลไบต์.',
        'string' => ':attribute ต้องมีไม่เกิน :value ตัวอักษร.',
        'array' => ':attribute ต้องมีไม่เกิน :value รายการ.',
    ],
    'max' => [
        'numeric' => ':attribute ต้องไม่มากกว่า :max.',
        'file' => ':attribute ต้องไม่มากกว่า :max กิโลไบต์.',
        'string' => ':attribute ต้องไม่มากกว่า :max ตัวอักษร.',
        'array' => ':attribute ต้องมีไม่เกิน :max รายการ.',
    ],
    'mimes' => ':attribute ต้องเป็นไฟล์ประเภท: :values.',
    'mimetypes' => ':attribute ต้องเป็นไฟล์ประเภท: :values.',
    'min' => [
        'numeric' => ':attribute ต้องมีอย่างน้อย :min.',
        'file' => ':attribute ต้องมีอย่างน้อย :min กิโลไบต์.',
        'string' => ':attribute ต้องมีอย่างน้อย :min ตัวอักษร.',
        'array' => ':attribute ต้องมีอย่างน้อย :min รายการ.',
    ],
    'multiple_of' => ':attribute ต้องเป็นจำนวนคูณของ :value.',
    'not_in' => ':attribute ที่เลือกไม่ถูกต้อง.',
    'not_regex' => 'รูปแบบ :attribute ไม่ถูกต้อง.',
    'numeric' => ':attribute ต้องเป็นตัวเลข.',
    'password' => 'รหัสผ่านไม่ถูกต้อง.',
    'present' => 'ฟิลด์ :attribute ต้องมีอยู่.',
    'regex' => 'รูปแบบ :attribute ไม่ถูกต้อง.',
    'required' => 'ฟิลด์ :attribute จำเป็นต้องมี.',
    'required_if' => 'ฟิลด์ :attribute จำเป็นต้องมีเมื่อ :other เป็น :value.',
    'required_unless' => 'ฟิลด์ :attribute จำเป็นต้องมี เว้นแต่ :other จะอยู่ใน :values.',
    'required_with' => 'ฟิลด์ :attribute จำเป็นต้องมีเมื่อ :values มีอยู่.',
    'required_with_all' => 'ฟิลด์ :attribute จำเป็นต้องมีเมื่อ :values มีอยู่.',
    'required_without' => 'ฟิลด์ :attribute จำเป็นต้องมีเมื่อ :values ไม่มีอยู่.',
    'required_without_all' => 'ฟิลด์ :attribute จำเป็นต้องมีเมื่อไม่มี :values ใดๆ อยู่.',
    'prohibited' => 'ฟิลด์ :attribute ถูกห้าม.',
    'prohibited_if' => 'ฟิลด์ :attribute ถูกห้ามเมื่อ :other เป็น :value.',
    'prohibited_unless' => 'ฟิลด์ :attribute ถูกห้าม เว้นแต่ :other จะอยู่ใน :values.',
    'same' => ':attribute และ :other ต้องตรงกัน.',
    'size' => [
        'numeric' => ':attribute ต้องเป็น :size.',
        'file' => ':attribute ต้องมีขนาด :size กิโลไบต์.',
        'string' => ':attribute ต้องมี :size ตัวอักษร.',
        'array' => ':attribute ต้องมี :size รายการ.',
    ],
    'starts_with' => ':attribute ต้องขึ้นต้นด้วยหนึ่งในสิ่งต่อไปนี้: :values.',
    'string' => ':attribute ต้องเป็นสตริง.',
    'timezone' => ':attribute ต้องเป็นโซนที่ถูกต้อง.',
    'unique' => ':attribute ถูกใช้ไปแล้ว.',
    'uploaded' => 'อัปโหลด :attribute ไม่สำเร็จ.',
    'url' => 'รูปแบบ :attribute ไม่ถูกต้อง.',
    'uuid' => ':attribute ต้องเป็น UUID ที่ถูกต้อง.',
    'budget_required' => 'ฟิลด์งบประมาณ จำเป็นต้องมี.',
    'budget_numeric' => 'งบประมาณต้องเป็นตัวเลข.',
    'budget_min' => 'งบประมาณต้องมากกว่า 0.',

    'project_name.required' => 'สวัสดี',

    /*
    |--------------------------------------------------------------------------
    | ข้อความตรวจสอบแบบกำหนดเอง (Custom Validation Language Lines)
    |--------------------------------------------------------------------------
    |
    | ระบุข้อความแสดงข้อผิดพลาดแบบกำหนดเองสำหรับแอตทริบิวต์ โดยใช้รูปแบบ
    | "attribute.rule" ในการระบุข้อความสำหรับแต่ละกฎ
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'ข้อความกำหนดเอง',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | แอตทริบิวต์สำหรับการตรวจสอบ (Custom Validation Attributes)
    |--------------------------------------------------------------------------
    |
    | ใช้สำหรับเปลี่ยนคำแสดงแอตทริบิวต์ให้เป็นมิตรกับผู้อ่าน เช่น เปลี่ยน "email" เป็น "อีเมล"
    |
    */

    'attributes' => [
        'email' => 'อีเมล',
        'password' => 'รหัสผ่าน',
        'username' => 'ชื่อผู้ใช้',
    ],

];

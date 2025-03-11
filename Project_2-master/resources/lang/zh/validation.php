<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 验证语言行 (Validation Language Lines)
    |--------------------------------------------------------------------------
    |
    | 以下语言行包含了验证器类使用的默认错误信息。
    | 某些规则具有多个版本，如大小规则。您可以在此自由修改这些消息。
    |
    */

    'accepted'             => ':attribute 必须被接受。',
    'active_url'           => ':attribute 不是一个有效的 URL。',
    'after'                => ':attribute 必须是 :date 之后的日期。',
    'after_or_equal'       => ':attribute 必须是 :date 或之后的日期。',
    'alpha'                => ':attribute 只能包含字母。',
    'alpha_dash'           => ':attribute 只能包含字母、数字、短横线和下划线。',
    'alpha_num'            => ':attribute 只能包含字母和数字。',
    'array'                => ':attribute 必须是一个数组。',
    'before'               => ':attribute 必须是 :date 之前的日期。',
    'before_or_equal'      => ':attribute 必须是 :date 或之前的日期。',
    'between'              => [
        'numeric' => ':attribute 必须介于 :min 和 :max 之间。',
        'file'    => ':attribute 的大小必须介于 :min 和 :max 千字节之间。',
        'string'  => ':attribute 必须介于 :min 和 :max 个字符之间。',
        'array'   => ':attribute 必须有 :min 到 :max 个项目。',
    ],
    'boolean'              => ':attribute 字段必须为 true 或 false。',
    'confirmed'            => ':attribute 的确认信息不匹配。',
    'date'                 => ':attribute 不是一个有效的日期。',
    'date_equals'          => ':attribute 必须是与 :date 相等的日期。',
    'date_format'          => ':attribute 的格式必须为 :format。',
    'different'            => ':attribute 和 :other 必须不同。',
    'digits'               => ':attribute 必须是 :digits 位数字。',
    'digits_between'       => ':attribute 必须是介于 :min 和 :max 位数字。',
    'dimensions'           => ':attribute 的图片尺寸无效。',
    'distinct'             => ':attribute 字段有重复的值。',
    'email'                => ':attribute 必须是一个有效的电子邮件地址。',
    'ends_with'            => ':attribute 必须以以下之一结尾：:values。',
    'exists'               => '所选的 :attribute 无效。',
    'file'                 => ':attribute 必须是一个文件。',
    'filled'               => ':attribute 字段不能为空。',
    'gt'                   => [
        'numeric' => ':attribute 必须大于 :value。',
        'file'    => ':attribute 必须大于 :value 千字节。',
        'string'  => ':attribute 必须超过 :value 个字符。',
        'array'   => ':attribute 必须多于 :value 个项目。',
    ],
    'gte'                  => [
        'numeric' => ':attribute 必须大于或等于 :value。',
        'file'    => ':attribute 必须大于或等于 :value 千字节。',
        'string'  => ':attribute 必须至少有 :value 个字符。',
        'array'   => ':attribute 必须至少有 :value 个项目。',
    ],
    'image'                => ':attribute 必须是一张图片。',
    'in'                   => '所选的 :attribute 无效。',
    'in_array'             => ':attribute 字段不存在于 :other 中。',
    'integer'              => ':attribute 必须是一个整数。',
    'ip'                   => ':attribute 必须是一个有效的 IP 地址。',
    'ipv4'                 => ':attribute 必须是一个有效的 IPv4 地址。',
    'ipv6'                 => ':attribute 必须是一个有效的 IPv6 地址。',
    'json'                 => ':attribute 必须是一个有效的 JSON 字符串。',
    'lt'                   => [
        'numeric' => ':attribute 必须小于 :value。',
        'file'    => ':attribute 必须小于 :value 千字节。',
        'string'  => ':attribute 必须少于 :value 个字符。',
        'array'   => ':attribute 必须少于 :value 个项目。',
    ],
    'lte'                  => [
        'numeric' => ':attribute 必须小于或等于 :value。',
        'file'    => ':attribute 必须小于或等于 :value 千字节。',
        'string'  => ':attribute 必须不超过 :value 个字符。',
        'array'   => ':attribute 的项目数不能超过 :value 个。',
    ],
    'max'                  => [
        'numeric' => ':attribute 不能大于 :max。',
        'file'    => ':attribute 不能大于 :max 千字节。',
        'string'  => ':attribute 不能超过 :max 个字符。',
        'array'   => ':attribute 不能有超过 :max 个项目。',
    ],
    'mimes'                => ':attribute 必须是类型为 :values 的文件。',
    'mimetypes'            => ':attribute 必须是类型为 :values 的文件。',
    'min'                  => [
        'numeric' => ':attribute 至少为 :min。',
        'file'    => ':attribute 至少为 :min 千字节。',
        'string'  => ':attribute 至少为 :min 个字符。',
        'array'   => ':attribute 至少应有 :min 个项目。',
    ],
    'multiple_of'          => ':attribute 必须是 :value 的倍数。',
    'not_in'               => '所选的 :attribute 无效。',
    'not_regex'            => ':attribute 的格式无效。',
    'numeric'              => ':attribute 必须是数字。',
    'password'             => '密码错误。',
    'present'              => ':attribute 字段必须存在。',
    'regex'                => ':attribute 的格式无效。',
    'required'             => ':attribute 字段为必填项。',
    'required_if'          => '当 :other 为 :value 时，:attribute 字段为必填项。',
    'required_unless'      => '除非 :other 在 :values 中，否则 :attribute 字段为必填项。',
    'required_with'        => '当 :values 存在时，:attribute 字段为必填项。',
    'required_with_all'    => '当 :values 存在时，:attribute 字段为必填项。',
    'required_without'     => '当 :values 不存在时，:attribute 字段为必填项。',
    'required_without_all' => '当 :values 都不存在时，:attribute 字段为必填项。',
    'prohibited'           => ':attribute 字段被禁止。',
    'prohibited_if'        => '当 :other 为 :value 时，:attribute 字段被禁止。',
    'prohibited_unless'    => '除非 :other 在 :values 中，否则 :attribute 字段被禁止。',
    'same'                 => ':attribute 和 :other 必须匹配。',
    'size'                 => [
        'numeric' => ':attribute 必须为 :size。',
        'file'    => ':attribute 必须为 :size 千字节。',
        'string'  => ':attribute 必须为 :size 个字符。',
        'array'   => ':attribute 必须包含 :size 个项目。',
    ],
    'starts_with'          => ':attribute 必须以以下之一开始：:values。',
    'string'               => ':attribute 必须是字符串。',
    'timezone'             => ':attribute 必须是一个有效的区域。',
    'unique'               => ':attribute 已被占用。',
    'uploaded'             => ':attribute 上传失败。',
    'url'                  => ':attribute 格式无效。',
    'uuid'                 => ':attribute 必须是一个有效的 UUID。',
    'budget_required'      => '预算字段为必填项。',
    'budget_numeric'       => '预算必须是数字。',
    'budget_min'           => '预算必须大于 0。',
    'project_name.required'=> '你好',

    /*
    |--------------------------------------------------------------------------
    | 自定义验证语言行 (Custom Validation Language Lines)
    |--------------------------------------------------------------------------
    |
    | 您可以为属性指定自定义验证消息。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '自定义消息',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 自定义验证属性 (Custom Validation Attributes)
    |--------------------------------------------------------------------------
    |
    | 用于将属性占位符替换为更友好的名称，例如将 "email" 替换为 "电子邮件"。
    |
    */

    'attributes' => [
        'email'    => '电子邮件',
        'password' => '密码',
        'username' => '用户名',
    ],

];

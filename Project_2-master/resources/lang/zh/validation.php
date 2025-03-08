<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines (中文)
    |--------------------------------------------------------------------------
    |
    | 以下语言行包含了验证器类默认使用的错误消息。
    | 某些规则有多个版本，例如大小规则。请根据需要调整这些消息。
    |
    */

    'accepted'             => ':attribute 必须被接受。',
    'active_url'           => ':attribute 不是一个有效的 URL。',
    'after'                => ':attribute 必须是一个在 :date 之后的日期。',
    'after_or_equal'       => ':attribute 必须是一个在 :date 之后或等于 :date 的日期。',
    'alpha'                => ':attribute 只能包含字母。',
    'alpha_dash'           => ':attribute 只能包含字母、数字、破折号和下划线。',
    'alpha_num'            => ':attribute 只能包含字母和数字。',
    'array'                => ':attribute 必须是一个数组。',
    'before'               => ':attribute 必须是一个在 :date 之前的日期。',
    'before_or_equal'      => ':attribute 必须是一个在 :date 之前或等于 :date 的日期。',
    'between'              => [
        'numeric' => ':attribute 必须介于 :min 和 :max 之间。',
        'file'    => ':attribute 必须介于 :min 和 :max 千字节之间。',
        'string'  => ':attribute 必须介于 :min 和 :max 个字符之间。',
        'array'   => ':attribute 必须有 :min 到 :max 个项目。',
    ],
    'boolean'              => ':attribute 字段必须为 true 或 false。',
    'confirmed'            => ':attribute 的确认不匹配。',
    'date'                 => ':attribute 不是一个有效的日期。',
    'date_equals'          => ':attribute 必须是一个等于 :date 的日期。',
    'date_format'          => ':attribute 与格式 :format 不匹配。',
    'different'            => ':attribute 和 :other 必须不同。',
    'digits'               => ':attribute 必须是 :digits 位数字。',
    'digits_between'       => ':attribute 必须是介于 :min 和 :max 位数字。',
    'dimensions'           => ':attribute 的图片尺寸无效。',
    'distinct'             => ':attribute 字段有重复值。',
    'email'                => ':attribute 必须是一个有效的邮箱地址。',
    'ends_with'            => ':attribute 必须以以下其中之一结尾：:values。',
    'exists'               => '选定的 :attribute 无效。',
    'file'                 => ':attribute 必须是一个文件。',
    'filled'               => ':attribute 字段必须有值。',
    'gt'                   => [
        'numeric' => ':attribute 必须大于 :value。',
        'file'    => ':attribute 必须大于 :value 千字节。',
        'string'  => ':attribute 必须多于 :value 个字符。',
        'array'   => ':attribute 必须多于 :value 个项目。',
    ],
    'gte'                  => [
        'numeric' => ':attribute 必须大于或等于 :value。',
        'file'    => ':attribute 必须大于或等于 :value 千字节。',
        'string'  => ':attribute 必须至少有 :value 个字符。',
        'array'   => ':attribute 必须有至少 :value 个项目。',
    ],
    'image'                => ':attribute 必须是一张图片。',
    'in'                   => '选定的 :attribute 无效。',
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
        'string'  => ':attribute 必须少于或等于 :value 个字符。',
        'array'   => ':attribute 不能超过 :value 个项目。',
    ],
    'max'                  => [
        'numeric' => ':attribute 不能大于 :max。',
        'file'    => ':attribute 不能超过 :max 千字节。',
        'string'  => ':attribute 不能超过 :max 个字符。',
        'array'   => ':attribute 不能超过 :max 个项目。',
    ],
    'mimes'                => ':attribute 必须是类型为 :values 的文件。',
    'mimetypes'            => ':attribute 必须是类型为 :values 的文件。',
    'min'                  => [
        'numeric' => ':attribute 必须至少为 :min。',
        'file'    => ':attribute 必须至少为 :min 千字节。',
        'string'  => ':attribute 必须至少有 :min 个字符。',
        'array'   => ':attribute 必须至少有 :min 个项目。',
    ],
    'multiple_of'          => ':attribute 必须是 :value 的倍数。',
    'not_in'               => '选定的 :attribute 无效。',
    'not_regex'            => ':attribute 格式无效。',
    'numeric'              => ':attribute 必须是一个数字。',
    'password'             => '密码不正确。',
    'present'              => ':attribute 字段必须存在。',
    'regex'                => ':attribute 格式无效。',
    'required'             => ':attribute 字段是必填项。',
    'required_if'          => '当 :other 为 :value 时，:attribute 字段是必填项。',
    'required_unless'      => '除非 :other 在 :values 中，否则 :attribute 字段是必填项。',
    'required_with'        => '当 :values 存在时，:attribute 字段是必填项。',
    'required_with_all'    => '当 :values 存在时，:attribute 字段是必填项。',
    'required_without'     => '当 :values 不存在时，:attribute 字段是必填项。',
    'required_without_all' => '当 :values 都不存在时，:attribute 字段是必填项。',
    'prohibited'           => ':attribute 字段不允许存在。',
    'prohibited_if'        => '当 :other 为 :value 时，:attribute 字段不允许存在。',
    'prohibited_unless'    => '除非 :other 在 :values 中，否则 :attribute 字段不允许存在。',
    'same'                 => ':attribute 和 :other 必须匹配。',
    'size'                 => [
        'numeric' => ':attribute 必须为 :size。',
        'file'    => ':attribute 必须为 :size 千字节。',
        'string'  => ':attribute 必须为 :size 个字符。',
        'array'   => ':attribute 必须包含 :size 个项目。',
    ],
    'starts_with'          => ':attribute 必须以以下其中之一开头: :values',
    'string'               => ':attribute 必须是一个字符串。',
    'timezone'             => ':attribute 必须是一个有效的时区。',
    'unique'               => ':attribute 已存在。',
    'uploaded'             => ':attribute 上传失败。',
    'url'                  => ':attribute 格式无效。',
    'uuid'                 => ':attribute 必须是一个有效的 UUID。',

    /*
    |--------------------------------------------------------------------------
    | 自定义验证语言行 (Custom Validation Language Lines) (中文)
    |--------------------------------------------------------------------------
    |
    | 您可以使用 "attribute.rule" 的格式为属性指定自定义验证消息。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 自定义属性名称 (Custom Validation Attributes) (中文)
    |--------------------------------------------------------------------------
    |
    | 以下语言行用于将我们的属性占位符替换为更友好的名称，例如将 "email" 替换为 "电子邮件地址"。
    |
    */

    'attributes' => [],

];

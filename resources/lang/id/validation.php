<?php

return [
    'accepted'             => ':attribute harus diterima.',
    'active_url'           => ':attribute bukan URL yang valid.',
    'after'                => ':attribute harus tanggal setelah :date.',
    'after_or_equal'       => ':attribute harus tanggal yang lebih besar atau sama dengan :date.',
    'alpha'                => ':attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':attribute hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num'            => ':attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':attribute harus berupa array.',
    'before'               => ':attribute harus tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus tanggal yang lebih kecil atau sama dengan :date.',
    'between'              => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file'    => ':attribute harus antara :min dan :max kilobytes.',
        'string'  => ':attribute harus antara :min dan :max karakter.',
        'array'   => ':attribute harus memiliki antara :min dan :max item.',
    ],
    'boolean'              => ':attribute harus bernilai true atau false.',
    'confirmed'            => ':attribute konfirmasi tidak cocok.',
    'date'                 => ':attribute bukan tanggal yang valid.',
    'date_equals'          => ':attribute harus tanggal yang sama dengan :date.',
    'date_format'          => ':attribute tidak cocok dengan format tanggal :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus terdiri dari :digits digit.',
    'digits_between'       => ':attribute harus terdiri dari antara :min dan :max digit.',
    'dimensions'           => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => ':attribute memiliki nilai duplikat.',
    'email'                => ':attribute harus berupa alamat email yang valid.',
    'ends_with'            => ':attribute harus diakhiri dengan salah satu dari berikut ini: :values.',
    'exists'               => ':attribute yang dipilih tidak valid.',
    'file'                 => ':attribute harus berupa file.',
    'filled'               => ':attribute harus diisi.',
    'gt'                   => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file'    => ':attribute harus lebih besar dari :value kilobytes.',
        'string'  => ':attribute harus lebih panjang dari :value karakter.',
        'array'   => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte'                  => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file'    => ':attribute harus lebih besar atau sama dengan :value kilobytes.',
        'string'  => ':attribute harus lebih panjang atau sama dengan :value karakter.',
        'array'   => ':attribute harus memiliki :value item atau lebih.',
    ],
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => ':attribute yang dipilih tidak valid.',
    'in_array'             => ':attribute tidak ada di dalam :other.',
    'integer'              => ':attribute harus berupa bilangan bulat.',
    'ip'                   => ':attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => ':attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => ':attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => ':attribute harus berupa string JSON yang valid.',
    'lt'                   => [
        'numeric' => ':attribute harus lebih kecil dari :value.',
        'file'    => ':attribute harus lebih kecil dari :value kilobytes.',
        'string'  => ':attribute harus lebih pendek dari :value karakter.',
        'array'   => ':attribute harus memiliki kurang dari :value item.',
    ],
    'lte'                  => [
        'numeric' => ':attribute harus lebih kecil atau sama dengan :value.',
        'file'    => ':attribute harus lebih kecil atau sama dengan :value kilobytes.',
        'string'  => ':attribute harus lebih pendek atau sama dengan :value karakter.',
        'array'   => ':attribute tidak boleh lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'file'    => ':attribute tidak boleh lebih besar dari :max kilobytes.',
        'string'  => ':attribute tidak boleh lebih panjang dari :max karakter.',
        'array'   => ':attribute tidak boleh memiliki lebih dari :max item.',
    ],
    'mimes'                => ':attribute harus berupa file dengan tipe: :values.',
    'mimetypes'            => ':attribute harus berupa file dengan tipe: :values.',
    'min'                  => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :min.',
        'file'    => ':attribute harus lebih besar atau sama dengan :min kilobytes.',
        'string'  => ':attribute harus memiliki minimal :min karakter.',
        'array'   => ':attribute harus memiliki minimal :min item.',
    ],
    'not_in'               => ':attribute yang dipilih tidak valid.',
    'not_regex'            => ':attribute format tidak valid.',
    'numeric'              => ':attribute harus berupa angka.',
    'password'             => [
        'letters' => ':attribute harus mengandung setidaknya satu huruf.',
        'mixed'   => ':attribute harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => ':attribute harus mengandung setidaknya satu angka.',
        'symbols' => ':attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => ':attribute telah dibocorkan di pelanggaran data. Pilih yang berbeda.',
    ],
    'present'              => ':attribute harus ada.',
    'regex'                => ':attribute format tidak valid.',
    'required'             => ':attribute harus diisi.',
    'required_if'          => ':attribute harus diisi jika :other adalah :value.',
    'required_unless'      => ':attribute harus diisi kecuali :other ada di dalam :values.',
    'required_with'        => ':attribute harus diisi jika :values ada.',
    'required_with_all'    => ':attribute harus diisi jika :values ada.',
    'required_without'     => ':attribute harus diisi jika :values tidak ada.',
    'required_without_all' => ':attribute harus diisi jika tidak ada :values.',
    'same'                 => ':attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => ':attribute harus berukuran :size.',
        'file'    => ':attribute harus berukuran :size kilobytes.',
        'string'  => ':attribute harus panjangnya :size karakter.',
        'array'   => ':attribute harus mengandung :size item.',
    ],
    'starts_with'          => ':attribute harus dimulai dengan salah satu dari berikut ini: :values.',
    'string'               => ':attribute harus berupa string.',
    'timezone'             => ':attribute harus berupa zona waktu yang valid.',
    'unique'               => ':attribute sudah terdaftar.',
    'uploaded'             => ':attribute gagal diunggah.',
    'url'                  => ':attribute harus berupa URL yang valid.',
    'uuid'                 => ':attribute harus berupa UUID yang valid.',
];

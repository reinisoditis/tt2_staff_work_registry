<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Atribūts :attribute ir jāpieņem.',
    'accepted_if' => 'Atribūts :attribute ir jāpieņem, ja :other ir :value.',
    'active_url' => 'Atribūts :attribute nav derīgs URL.',
    'after' => 'Atribūtam :attribute ir jābūt datumam pēc :date.',
    'after_or_equal' => 'Atribūtam :attribute ir jābūt datumam pēc :date vai vienādam ar to.',
    'alpha' => 'Atribūtā :attribute drīkst būt tikai burti.',
    'alpha_dash' => 'Atribūtā :attribute drīkst būt tikai burti, cipari, domuzīmes un pasvītras.',
    'alpha_num' => 'Atribūtā :attribute drīkst būt tikai burti un cipari.',
    'array' => 'Atribūtam :attribute ir jābūt masīvam.',
    'before' => 'Atribūtam :attribute ir jābūt datumam pirms :date.',
    'before_or_equal' => 'Atribūtam :attribute ir jābūt datumam pirms :date vai vienādam ar to.',
    'between' => [
        'array' => 'Atribūtam :attribute jābūt no :min līdz :max vienumiem.',
        'file' => 'Atribūtam :attribute ir jābūt starp :min un :max kilobaiti.',
        'numeric' => 'Atribūtam :attribute ir jābūt starp :min un :max.',
        'string' => 'Atribūtam :attribute ir jābūt starp :min un :max rakstzīmēm.',
    ],
    'boolean' => ' Laukam :attribute ir jābūt patiesam vai nepatiesam.',
    'confirmed' => 'Atribūta apstiprinājums neatbilst.',
    'current_password' => 'Parole ir nepareiza.',
    'date' => ':attribute nav derīgs datums.',
    'date_equals' => 'Atribūtam :attribute ir jābūt datumam, kas vienāds ar :date.',
    'date_format' => 'Atribūts :attribute neatbilst formātam :format.',
    'declined' => 'Atribūts :attribute ir jānoraida.',
    'declined_if' => 'Atribūts :attribute ir jānoraida, ja :other ir :value.',
    'different' => 'Atribūtam :attribute un :other ir jābūt atšķirīgiem.',
    'digits' => 'Atribūtam ir jābūt :digits cipariem.',
    'digits_between' => 'Atribūtam :attribute jābūt starp :min un :max cipariem.',
    'dimensions' => 'Atribūtam :attribute ir nederīgi attēla izmēri.',
    'distinct' => 'Laukam :attribute ir dublikāta vērtība.',
    'email' => 'Atribūtam :attribute ir jābūt derīgai e-pasta adresei.',
    'ends_with' => 'Atribūtam :attribute jābeidzas ar vienu no šiem: :values.',
    'enum' => 'Atlasītais :attribute nav derīgs.',
    'exists' => 'Atlasītais :attribute nav derīgs.',
    'file' => 'Atribūtam :attribute ir jābūt failam.',
    'filled' => ' Laukam :attribute ir jābūt vērtībai.',
    'gt' => [
        'array' => 'Atribūtam :attribute ir jābūt vairāk nekā :value vienumiem.',
        'file' => 'Atribūtam :attribute ir jābūt lielākam par :value kilobaitiem.',
        'numeric' => 'Atribūtam :attribute ir jābūt lielākam par :value.',
        'string' => 'Atribūtam :attribute ir jābūt lielākam par :value rakstzīmēm.',
    ],
    'gte' => [
        'array' => 'Atribūtam :attribute ir jābūt :value vienumiem vai vairāk.',
        'file' => 'Atribūtam :attribute ir jābūt lielākam vai vienādam ar :value kilobaiti.',
        'numeric' => 'Atribūtam :attribute ir jābūt lielākam vai vienādam ar :value.',
        'string' => 'Atribūtam :attribute ir jābūt lielākam vai vienādam ar :value rakstzīmēm.',
    ],
    'image' => 'Atribūtam :attribute ir jābūt attēlam.',
    'in' => 'Atlasītais :attribute ir nederīgs.',
    'in_array' => ' Lauks :attribute neeksistē :other.',
    'integer' => 'Atribūtam :attribute ir jābūt veselam skaitlim.',
    'ip' => 'Atribūtam :attribute ir jābūt derīgai IP adresei.',
    'ipv4' => 'Atribūtam :attribute ir jābūt derīgai IPv4 adresei.',
    'ipv6' => 'Atribūtam :attribute ir jābūt derīgai IPv6 adresei.',
    'json' => 'Atribūtam :attribute ir jābūt derīgai JSON virknei.',
    'lt' => [
        'array' => 'Atribūtam :attribute jābūt mazākam par :value vienumiem.',
        'file' => 'Atribūtam :attribute ir jābūt mazākam par :value kilobaitiem.',
        'numeric' => 'Atribūtam :attribute ir jābūt mazākam par :value.',
        'string' => 'Atribūtam :attribute ir jābūt mazākam par :value rakstzīmēm.',
    ],
    'lte' => [
        'array' => 'Atribūtā :attribute nedrīkst būt vairāk par :value vienumiem.',
        'file' => 'Atribūtam :attribute ir jābūt mazākam vai vienādam ar :value kilobaiti.',
        'numeric' => 'Atribūtam :attribute ir jābūt mazākam vai vienādam ar :value.',
        'string' => 'Atribūtam :attribute ir jābūt mazākam vai vienādam ar :value rakstzīmēm.',
    ],
    'mac_address' => 'Atribūtam :attribute ir jābūt derīgai MAC adresei.',
    'max' => [
        'array' => 'Atribūtā :attribute nedrīkst būt vairāk par :max vienumiem.',
        'file' => 'Atribūts :attribute nedrīkst būt lielāks par :maksimāli kilobaitiem.',
        'numeric' => 'Atribūts :attribute nedrīkst būt lielāks par :max.',
        'string' => 'Atribūts :attribute nedrīkst būt lielāks par :max rakstzīmēm.',
    ],
    'mimes' => 'Atribūtam :attribute ir jābūt šāda veida failam: :values.',
    'mimetypes' => 'Atribūtam :attribute ir jābūt šāda veida failam: :values.',
    'min' => [
        'array' => 'Atribūtā :attribute ir jābūt vismaz :min vienumiem.',
        'file' => 'Atribūtam :attribute ir jābūt vismaz :min kilobaitiem.',
        'numeric' => 'Atribūtam :attribute ir jābūt vismaz :min.',
        'string' => 'Atribūtam :attribute ir jābūt vismaz :min rakstzīmēm.',
    ],
    'multiple_of' => 'Atribūtam :attribute ir jābūt :value daudzkārtnim.',
    'not_in' => 'Atlasītais :attribute nav derīgs.',
    'not_regex' => ':attribute formāts nav derīgs.',
    'numeric' => 'Atribūtam :attribute ir jābūt skaitlim.',
    'password' => [
        'letters' => 'Atribūtā :attribute jāsatur vismaz viens burts.',
        'mixed' => 'Atribūtā :attribute jāsatur vismaz viens lielais un viens mazais burts.',
        'numbers' => 'Atribūtā :attribute jāsatur vismaz viens skaitlis.',
        'symbols' => 'Atribūtā :attribute jāsatur vismaz viens simbols.',
        'uncompromised' => 'Dotais :attribute ir parādījies datu noplūdē. Lūdzu, izvēlieties citu :attribute.',
    ],
    'present' => 'Jābūt laukam :attribute.',
    'prohibited' => 'Lauks :attribute ir aizliegts.',
    'prohibited_if' => 'Lauks :attribute ir aizliegts, ja :other ir :value.',
    'prohibited_unless' => 'Lauks :attribute ir aizliegts, ja vien :other nav :values.',
    'prohibits' => 'Lauks :attribute aizliedz :other atrasties.',
    'regex' => ':attribute formāts nav derīgs.',
    'required' => 'Atribūta lauks ir nepieciešams.',
    'required_array_keys' => 'Laukā :attribute ir jābūt ierakstiem: :values.',
    'required_if' => 'Lauls :attribute ir nepieciešams, ja :other ir :value.',
    'required_unless' => 'Lauls :attribute ir nepieciešams, ja vien :other nav :values.',
    'required_with' => 'Lauls :attribute ir nepieciešams, ja ir :values.',
    'required_with_all' => 'Lauls :attribute ir nepieciešams, ja ir :values.',
    'required_without' => 'Lauls :attribute ir nepieciešams, ja :values ​​nav.',
    'required_without_all' => 'Lauls :attribute ir nepieciešams, ja nav neviena no :vērtībām.',
    'same' => 'Atribūtam :attribute un :other ir jāsakrīt.',
    'size' => [
        'array' => 'Atribūtā :attribute jāsatur :size vienumi.',
        'file' => 'Atribūtam :attribute ir jābūt :izmēram kilobaiti.',
        'numeric' => 'Atribūtam :attribute ir jābūt :size.',
        'string' => 'Atribūtam :attribute ir jābūt :size rakstzīmēm.',
    ],
    'starts_with' => 'Atribūtam :attribute jāsākas ar vienu no šiem: :values.',
    'string' => 'Atribūtam :attribute ir jābūt virknei.',
    'timezone' => ':attribute ir jābūt derīgai laika joslai.',
    'unique' => 'Atribūts :attribute jau ir izmantots.',
    'uploaded' => 'Atribūtu :attribute neizdevās augšupielādēt.',
    'url' => 'Atribūtam :attribute ir jābūt derīgam URL.',
    'uuid' => 'Atribūtam :attribute ir jābūt derīgam UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'pielāgots ziņojums',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

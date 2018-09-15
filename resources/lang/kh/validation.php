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

    'accepted' => 'The :attribute ត្រូវតែទទួលយក។',
    'active_url' => 'The :attribute មិនមែនជា URL ត្រឹមត្រូវទេ។',
    'after' => 'The :attribute ត្រូវតែជាកាលបរិច្ឆេទក្រោយ :date.',
    'after_or_equal' => 'The :attribute ត្រូវតែជាកាលបរិច្ឆេទក្រោយឬស្មើ :date.',
    'alpha' => 'The :attribute អាចមានតែអក្សរប៉ុណ្ណោះ។',
    'alpha_dash' => 'The :attribute អាចមានតែអក្សរ, លេខ, សញ្ញា (_) និងសញ្ញាគូសក្រោមប៉ុណ្ណោះ។',
    'alpha_num' => 'The :attribute អាចមានតែអក្សរនិងលេខប៉ុណ្ណោះ។',
    'array' => 'The :attribute ត្រូវតែជាអារ៉េ។',
    'before' => 'The :attribute ត្រូវតែជាកាលបរិច្ឆេទមុន :date.',
    'before_or_equal' => 'The :attribute ត្រូវតែជាកាលបរិច្ឆេទមុនឬស្មើ :date.',
    'between' => [
        'numeric' => 'The :attribute ត្រូវតែនៅចន្លោះ :min និង :max.',
        'file' => 'The :attribute ត្រូវតែនៅចន្លោះ :min និង :max គីឡូបៃ.',
        'string' => 'The :attribute គីឡូបៃ :min និង :max តួអក្សរ។',
        'array' => 'The :attribute ត្រូវតែមានរវាង :min និង :max ធាតុ។',
    ],
    'boolean' => 'The :attribute វាលត្រូវតែពិតឬមិនពិត។',
    'confirmed' => 'The :attribute ការបញ្ជាក់មិនត្រូវគ្នា។',
    'date' => 'The :attribute មិនមែនជាកាលបរិច្ឆេទត្រឹមត្រូវទេ។',
    'date_format' => 'The :attribute មិនត្រូវគ្នានឹងទ្រង់ទ្រាយ :format.',
    'different' => 'The :attribute និង :other ត្រូវតែខុសគ្នា។',
    'digits' => 'The :attribute ត្រូវតែ :digits តួលេខ។',
    'digits_between' => 'The :attribute ត្រូវតែនៅចន្លោះ :min និង :max តួលេខ។',
    'dimensions' => 'The :attribute មានវិមាត្ររូបភាពមិនត្រឹមត្រូវ។',
    'distinct' => 'The :attribute វាលមានតម្លៃស្ទួនមួយ។',
    'email' => 'The :attribute ត្រូវតែជាអាសយដ្ឋានអ៊ីមែលត្រឹមត្រូវ។',
    'exists' => 'The selected :attribute មិនត្រឹមត្រូវ។',
    'file' => 'The :attribute ត្រូវតែជាឯកសារ។',
    'filled' => 'The :attribute វាលត្រូវតែមានតម្លៃ។',
    'gt' => [
        'numeric' => 'The :attribute ត្រូវតែធំជាង :value.',
        'file' => 'The :attribute ត្រូវតែធំជាង :value គីឡូបៃ។',
        'string' => 'The :attribute ត្រូវតែធំជាង :value តួអក្សរ។',
        'array' => 'The :attribute ត្រូវតែមានច្រើនជាង :value ធាតុ។',
    ],
    'gte' => [
        'numeric' => 'The :attribute ត្រូវតែធំជាងឬស្មើ :value.',
        'file' => 'The :attribute ត្រូវតែធំជាងឬស្មើ :value គីឡូបៃ។',
        'string' => 'The :attribute ត្រូវតែធំជាងឬស្មើ :value តួអក្សរ។',
        'array' => 'The :attribute ត្រូវតែ​មាន :value ធាតុឬច្រើនទៀត។',
    ],
    'image' => 'The :attribute ត្រូវតែជារូបភាព។',
    'in' => 'The selected :attribute មិនត្រឹមត្រូវ។',
    'in_array' => 'The :attribute វាលមិនមាននៅក្នុង :other.',
    'integer' => 'The :attribute ត្រូវតែជាចំនួនគត់។',
    'ip' => 'The :attribute ត្រូវតែជាអាសយដ្ឋាន IP ត្រឹមត្រូវ។',
    'ipv4' => 'The :attribute ត្រូវតែជាអាសយដ្ឋាន IPv4 ត្រឹមត្រូវ។',
    'ipv6' => 'The :attribute ត្រូវតែជាអាសយដ្ឋាន IPv6 ត្រឹមត្រូវ។',
    'json' => 'The :attribute ត្រូវតែជាខ្សែអក្សរ JSON ត្រឹមត្រូវ។',
    'lt' => [
        'numeric' => 'The :attribute ត្រូវតែតិចជាង :value.',
        'file' => 'The :attribute ត្រូវតែតិចជាង :value គីឡូបៃ។',
        'string' => 'The :attribute ត្រូវតែតិចជាង :value តួអក្សរ។',
        'array' => 'The :attribute ត្រូវតែមានតិចជាង :value ធាតុ។',
    ],
    'lte' => [
        'numeric' => 'The :attribute ត្រូវតែតិចជាងឬស្មើ :value.',
        'file' => 'The :attribute ត្រូវតែតិចជាងឬស្មើ :value គីឡូបៃ។',
        'string' => 'The :attribute ត្រូវតែតិចជាងឬស្មើ :value តួអក្សរ។',
        'array' => 'The :attribute មិនត្រូវមានច្រើនជាង :value ធាតុ។',
    ],
    'max' => [
        'numeric' => 'The :attribute អាចនឹងមិនធំជាង :max.',
        'file' => 'The :attribute អាចនឹងមិនធំជាង :max គីឡូបៃ។',
        'string' => 'The :attribute អាចនឹងមិនធំជាង :max តួអក្សរ។',
        'array' => 'The :attribute អាចមិនមានច្រើនជាង :max ធាតុ។',
    ],
    'mimes' => 'The :attribute ត្រូវតែជាឯកសារប្រភេទ: :values.',
    'mimetypes' => 'The :attribute ត្រូវតែជាឯកសារប្រភេទ: :values.',
    'min' => [
        'numeric' => 'The :attribute ត្រូវតែយ៉ាងហោចណាស់ :min.',
        'file' => 'The :attribute ត្រូវតែយ៉ាងហោចណាស់ :min គីឡូបៃ។',
        'string' => 'The :attribute ត្រូវតែយ៉ាងហោចណាស់ :min តួអក្សរ។',
        'array' => 'The :attribute ត្រូវតែមានយ៉ាងហោចណាស់ :min ធាតុ។',
    ],
    'not_in' => 'The selected :attribute មិនត្រឹមត្រូវ។',
    'not_regex' => 'The :attribute ទ្រង់ទ្រាយមិនត្រឹមត្រូវ។',
    'numeric' => 'The :attribute ត្រូវតែជាលេខ។',
    'present' => 'The :attribute វាលត្រូវតែមានវត្តមាន។',
    'regex' => 'The :attribute ទ្រង់ទ្រាយមិនត្រឹមត្រូវ។',
    'required' => 'The :attribute វាលត្រូវបានទាមទារ។',
    'required_if' => 'The :attribute វាលត្រូវបានទាមទារនៅពេល :other គឺ :value.',
    'required_unless' => 'The :attribute វាលត្រូវបានទាមទារលុះត្រាតែ :other គឺនៅក្នុង :values.',
    'required_with' => 'The :attribute វាលត្រូវបានទាមទារនៅពេល :values មានវត្តមាន។',
    'required_with_all' => 'The :attribute វាលត្រូវបានទាមទារនៅពេល :values មានវត្តមាន។',
    'required_without' => 'The :attribute វាលត្រូវបានទាមទារនៅពេល :values មិនមានវត្តមាន។',
    'required_without_all' => 'The :attribute វាលត្រូវបានទាមទារនៅពេលគ្មាន :values មានវត្តមាន។',
    'same' => 'The :attribute និង :other ត្រូវតែផ្គូផ្គង។',
    'size' => [
        'numeric' => 'The :attribute ត្រូវតែ :size.',
        'file' => 'The :attribute ត្រូវតែ :size គីឡូបៃ។',
        'string' => 'The :attribute ត្រូវតែ :size តួអក្សរ។',
        'array' => 'The :attribute ត្រូវតែមាន :size ធាតុ។',
    ],
    'string' => 'The :attribute ត្រូវតែជាខ្សែអក្សរ។',
    'timezone' => 'The :attribute ត្រូវតែជាតំបន់ត្រឹមត្រូវ។',
    'unique' => 'The :attribute ត្រូវបានគេយករួចហើយ។',
    'uploaded' => 'The :attribute បរាជ័យក្នុងការផ្ទុកឡើង។',
    'url' => 'The :attribute ទ្រង់ទ្រាយមិនត្រឹមត្រូវ។',

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
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

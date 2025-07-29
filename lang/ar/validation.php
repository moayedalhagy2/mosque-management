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

    'accepted' => 'يجب قبول حقل :attribute.',
    'accepted_if' => 'يجب قبول حقل :attribute عندما يكون :other بقيمة :value.',
    'active_url' => 'يجب أن يكون حقل :attribute عنوان URL صالحًا.',
    'after' => 'يجب أن يكون حقل :attribute تاريخًا بعد :date.',
    'after_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا بعد أو يساوي :date.',
    'alpha' => 'يجب أن يحتوي حقل :attribute على حروف فقط.',
    'alpha_dash' => 'يجب أن يحتوي حقل :attribute على حروف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'يجب أن يحتوي حقل :attribute على حروف وأرقام فقط.',
    'array' => 'يجب أن يكون حقل :attribute مصفوفة.',
    'ascii' => 'يجب أن يحتوي حقل :attribute على أحرف أبجدية رقمية ورموز ذات بايت واحد فقط.',
    'before' => 'يجب أن يكون حقل :attribute تاريخًا قبل :date.',
    'before_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => 'يجب أن يحتوي حقل :attribute على ما بين :min و :max عنصرًا.',
        'file' => 'يجب أن يكون حجم الملف في حقل :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute بين :min و :max.',
        'string' => 'يجب أن يكون طول النص في حقل :attribute بين :min و :max حرفًا.',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خطأ.',
    'can' => 'يحتوي حقل :attribute على قيمة غير مسموح بها.',
    'confirmed' => 'تأكيد حقل :attribute لا يتطابق.',
    'contains' => 'حقل :attribute يفتقد إلى قيمة مطلوبة.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'يجب أن يكون حقل :attribute تاريخًا صالحًا.',
    'date_equals' => 'يجب أن يكون حقل :attribute تاريخًا مساويًا لـ :date.',
    'date_format' => 'يجب أن يكون حقل :attribute مطابقًا للتنسيق :format.',
    'decimal' => 'يجب أن يحتوي حقل :attribute على :decimal منازل عشرية.',
    'declined' => 'يجب رفض حقل :attribute.',
    'declined_if' => 'يجب رفض حقل :attribute عندما يكون :other بقيمة :value.',
    'different' => 'يجب أن يكون حقل :attribute وحقل :other مختلفين.',
    'digits' => 'يجب أن يحتوي حقل :attribute على :digits رقمًا.',
    'digits_between' => 'يجب أن يحتوي حقل :attribute على عدد أرقام بين :min و :max.',
    'dimensions' => 'يحتوي حقل :attribute على أبعاد صورة غير صالحة.',
    'distinct' => 'يحتوي حقل :attribute على قيمة مكررة.',
    'doesnt_end_with' => 'يجب ألا ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'يجب ألا يبدأ حقل :attribute بأحد القيم التالية: :values.',
    'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'exists' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'extensions' => 'يجب أن يكون لحقل :attribute إحدى الامتدادات التالية: :values.',
    'file' => 'يجب أن يكون حقل :attribute ملفًا.',
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
    'gt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أكثر من :value عنصر.',
        'file' => 'يجب أن يكون حجم الملف في حقل :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من :value.',
        'string' => 'يجب أن يحتوي حقل :attribute على أكثر من :value حرفًا.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :value عنصرًا أو أكثر.',
        'file' => 'يجب أن يكون حجم الملف في حقل :attribute أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من أو تساوي :value.',
        'string' => 'يجب أن يحتوي حقل :attribute على :value حرفًا أو أكثر.',
    ],
    'hex_color' => 'يجب أن يكون حقل :attribute لونًا صحيحًا بصيغة هكس.',
    'image' => 'يجب أن يكون حقل :attribute صورة.',
    'in' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'in_array' => 'يجب أن يكون حقل :attribute موجودًا في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون حقل :attribute نص JSON صالحًا.',
    'list' => 'يجب أن يكون حقل :attribute قائمة.',
    'lowercase' => 'يجب أن يكون حقل :attribute بأحرف صغيرة.',
    'lt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أقل من :value عنصر.',
        'file' => 'يجب أن يكون حجم الملف في حقل :attribute أقل من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أقل من :value.',
        'string' => 'يجب أن يحتوي حقل :attribute على أقل من :value حرفًا.',
    ],
    'lte' => [
        'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :value عنصر.',
        'file' => 'يجب أن يكون حجم الملف في حقل :attribute أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أقل من أو تساوي :value.',
        'string' => 'يجب أن يحتوي حقل :attribute على :value حرفًا أو أقل.',
    ],
    'mac_address' => 'يجب أن يكون حقل :attribute عنوان MAC صالحًا.',
    'max' => [
        'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عنصر.',
        'file' => 'يجب ألا يكون حجم الملف في حقل :attribute أكبر من :max كيلوبايت.',
        'numeric' => 'يجب ألا تكون قيمة حقل :attribute أكبر من :max.',
        'string' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max حرفًا.',
    ],
    'max_digits' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max أرقام.',
    'mimes' => 'يجب أن يكون حقل :attribute ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون حقل :attribute ملفًا من النوع: :values.',
    'min' => [
        'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عنصر.',
        'file' => 'يجب أن يكون حجم الملف في حقل :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute على الأقل :min.',
        'string' => 'يجب أن يحتوي حقل :attribute على الأقل على :min أحرف.',
    ],
    'min_digits' => 'يجب أن يحتوي حقل :attribute على الأقل على :min أرقام.',
    'missing' => 'يجب أن يكون حقل :attribute مفقودًا.',
    'missing_if' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :other بقيمة :value.',
    'missing_unless' => 'يجب أن يكون حقل :attribute مفقودًا إلا إذا كان :other بقيمة :value.',
    'missing_with' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :values موجودًا.',
    'missing_with_all' => 'يجب أن يكون حقل :attribute مفقودًا عندما تكون :values موجودة.',
    'multiple_of' => 'يجب أن تكون قيمة حقل :attribute من مضاعفات :value.',
    'not_in' => 'القيمة المحددة لحقل :attribute غير صالحة.',
    'not_regex' => 'تنسيق حقل :attribute غير صالح.',
    'numeric' => 'يجب أن يكون حقل :attribute رقمًا.',
    'password' => [
        'letters' => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي حقل :attribute على حرف كبير وآخر صغير على الأقل.',
        'numbers' => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'تم تسريب حقل :attribute المعطى في اختراق بيانات. يرجى اختيار :attribute مختلف.',
    ],
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'present_if' => 'يجب أن يكون حقل :attribute موجودًا عندما يكون :other هو :value.',
    'present_unless' => 'يجب أن يكون حقل :attribute موجودًا إلا إذا كان :other هو :value.',
    'present_with' => 'يجب أن يكون حقل :attribute موجودًا عندما يكون :values موجودًا.',
    'present_with_all' => 'يجب أن يكون حقل :attribute موجودًا عندما تكون :values موجودة.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
    'prohibited_unless' => 'حقل :attribute محظور إلا إذا كان :other في :values.',
    'prohibits' => 'حقل :attribute يمنع وجود :other.',
    'regex' => 'تنسيق حقل :attribute غير صحيح.',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'يجب أن يحتوي حقل :attribute على المدخلات التالية: :values.',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_if_accepted' => 'حقل :attribute مطلوب عندما يتم قبول :other.',
    'required_if_declined' => 'حقل :attribute مطلوب عندما يتم رفض :other.',
    'required_unless' => 'حقل :attribute مطلوب إلا إذا كان :other في :values.',
    'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا يكون أي من :values موجودًا.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :size عناصر.',
        'file' => 'يجب أن يكون حجم حقل :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute مساوياً لـ :size.',
        'string' => 'يجب أن يحتوي حقل :attribute على :size حروفًا.',
    ],
    'starts_with' => 'يجب أن يبدأ حقل :attribute بإحدى القيم التالية: :values.',
    'string' => 'يجب أن يكون حقل :attribute نصًا.',
    'timezone' => 'يجب أن يكون حقل :attribute منطقة زمنية صالحة.',
    'unique' => 'تم أخذ :attribute بالفعل.',
    'uploaded' => 'فشل تحميل حقل :attribute.',
    'uppercase' => 'يجب أن يكون حقل :attribute بالأحرف الكبيرة.',
    'url' => 'يجب أن يكون حقل :attribute رابط URL صالح.',
    'ulid' => 'يجب أن يكون حقل :attribute ULID صالح.',
    'uuid' => 'يجب أن يكون حقل :attribute UUID صالح.',


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


    'duplicated_product_variant_option' => 'القيمة :attribute مكررة لنفس الخيار.',
    'promotion_status_pending' => 'يمكن تعديل :attribute فقط إذا كانت حالة الترويج قيد الانتظار.',
    'product_variant_conflict' => 'لا يمكن إدخال product_variant_id مع product_id.',
    'coordinates_conflict' => 'لا يمكن إدخال coordinates مع address_id.',
    'comma_separated_list' => 'يجب أن يكون :attribute قائمة مفصولة بفواصل.',
    'unique_items' => 'يجب أن يحتوي :attribute على عناصر فريدة.',
    'extra_time_not_allowed' => 'لا يمكنك إضافة وقت إضافي إلى مزاد مرفوض أو مكتمل.',
    'extra_time_after_end' => 'يجب تحديد الوقت الإضافي بعد تاريخ الانتهاء الحالي.',
    'product_must_be_active' => 'المنتج يجب أن يكون نشطًا .',
    'has_variants_cannot_disable' => 'لا يمكن تعطيل المتغيرات لهذا المنتج لأنه يحتوي بالفعل على متغيرات.',
    'cannot_enable_variants_with_existing_stock' => 'لا يمكن تمكين المتغيرات لهذا المنتج لأنه يحتوي على مخزون. يرجى تصفير المخزون أولاً.',
    'unique_sku' => 'رمز SKU مستخدم بالفعل من قبل منتج أو متغير آخر.',
    'cannot_purchase_directly' => 'لا يمكنك شراء هذا المنتج مباشرة لاحتوائه على متغيرات.',
    'prevent_update_phone_if_login_system' => 'لا يمكنك تحديث رقم الهاتف الخاص بك عند استخدام طريقة تسجيل الدخول برقم الهاتف.',
    'max_worker_per_job_title' => 'لا يمكن إضافة أكثر من 5 عاملين بنفس المسمى الوظيفي في نفس المسجد',
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

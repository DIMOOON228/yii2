<?php
    use yii\widgets\DetailView;
    echo DetailView::widget([
        'model'=>$model,
        'attributes'=>[
            'id',
            'first_name',
            'last_name',
            'company_name',
            'address',
            'city',
            'county',
            'state',
            'zip',
            'phone1',
            'phone2',
            'email',
            'web',
            'image:image' // это я добавил для того , а вдруг будет фото человека так сказать полная учетна запись 
        ],
    ]);
?>
<form>
    <input value=""/>
</form>    
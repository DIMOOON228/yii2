<?php
$this->registerJsFile('/web/js/index.js?v='.filemtime(Yii::getAlias('@webroot/js/index.js')), ['depends' => 'yii\web\JqueryAsset']);
?>
<h1>Список данных</h1>
<table class="table" id="product-table">
    <thead>
    <tr>
            <th class="sorting-btn" data-name="id" data-direction="asc">id</th>
            <th class="sorting-btn" data-name="first_name" data-direction="asc">first_name</th>
            <th class="sorting-btn" data-name="last_name" data-direction="asc">last_name</th>
            <th class="sorting-btn" data-name="company_name" data-direction="asc">company_name</th>
            <th class="sorting-btn" data-name="address" data-direction="asc">address</th>
            <th class="sorting-btn" data-name="city" data-direction="asc">city</th>
            <th class="sorting-btn" data-name="county" data-direction="asc">county</th>
            <th class="sorting-btn" data-name="state" data-direction="asc">state</th>
            <th class="sorting-btn" data-name="zip" data-direction="asc">zip</th>
            <th class="sorting-btn" data-name="phone1" data-direction="asc">phone1</th>
            <th class="sorting-btn" data-name="phone2" data-direction="asc">phone2</th>
            <th class="sorting-btn" data-name="email" data-direction="asc">email</th>
            <th class="sorting-btn" data-name="web" data-direction="asc">web</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">loader</td>
        </tr>   
    </tbody>  
</table>       
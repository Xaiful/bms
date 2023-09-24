<div class="form-group">
    <table class="bill_form bill_input_form">
        <thead>
        <tr>
            <th> নং</th>
            <th> পণ্যের  নাম </th>
            
            <th>প্যাকিং  সাইজ /  একক </th>
            <th> পরিমাণ</th>
            <th> বোনাস  </th>
            <th> মোট  পরিমাণ</th>
            <th>ক্রয় দর</th>
            <th>বিক্রয় দর</th>
            <th> টাকা</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td><input type="text" name="product_des[]" class="product_name" required="">
                <input type="hidden" name="product_code[]" class="product_code">
            </td>

            <td><input type="text" name="unit[]" class="unit"></td>
            <td><input style="text-align: right" step="any" type="text" name="quantity[]" class="product_quantities_bill" required=""></td>
            <td><input style="text-align: right" step="any" type="text" name="bonus[]" class="bonus_bill"></td>
            <td><input style="text-align: right" step="any" type="text" name="total_quantity[]" class="total_quantity" readonly=""></td>
            <td><input style="text-align: right" step="any" type="text" name="rate[]" class="product_rate_bill purchase_rate" required=""></td>
            <td><input style="text-align: right" step="any" type="text" name="sale_rate[]" class="sale_rate"></td>
            <td><input style="text-align: right" type="number" name="amount[]" class="amount" readonly=""></td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td class="" style="vertical-align: top;text-align: left; border: 0px">
            </td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td class="text-right"> মোট: </td>
            <td><input type="number" name="total_amount" class="" readonly=""></td>
        </tr>
        <tr>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td class="text-right">  পূর্বের জের:</td>
            <td><input type="number" name="previous" class="" value="0" readonly=""></td>
        </tr>
        <tr>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td class="text-right">   নগদ প্রদান  :</td>
            <td><input type="number" step="any" name="current_payment" class="" value="0"></td>
        </tr>
        <tr>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td class="text-right"> ডিসকাউন্ট (ছাড়):</td>
            <td><input type="number" step="any" name="discount_bill" value="0" class=""></td>
        </tr>
        <tr>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td style="border: 0px"></td>
            <td class="text-right"> সর্বমোট বকেয়া:</td>
            <td><input type="number" name="total_due" class="" readonly=""></td>
        </tr>
        </tfoot>
    </table>
</div>
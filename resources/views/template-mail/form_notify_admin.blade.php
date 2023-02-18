<div class="container">
    <div class="row">
        <div class="col s3"></div>
        <div class="col s6 center">
            <h3>Kết quả giao dịch từ khách hàng</h3>
            <div>Mã giao dịch: {{$details['code_payment']}}</div>
            <div>Email: {{@$details['email_customer']}}</div>
            <div>Phone: {{@$details['phone_customer']}}</div>
            <div>Địa chỉ: {{@$details['address_customer']}}</div>
            <div>Số tiền: {{@$details['amount_customer']}}</div>
        </div>
    </div>
</div>

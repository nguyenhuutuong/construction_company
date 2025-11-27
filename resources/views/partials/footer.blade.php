<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Về chúng tôi</h5>
                <p>{{ setting('site.description') }}</p>
            </div>
            <div class="col-md-4">
                <h5>Thông tin liên lạc</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-geo-alt-fill me-2"></i> Địa chỉ: {{ setting('site.address') }}</li>
                    <li><i class="bi bi-telephone-fill me-2"></i> Điện thoại: {{ setting('site.phone') }}</li>
                    <li><i class="bi bi-envelope-fill me-2"></i> Email: {{ setting('site.email') }}</li>
                </ul>
            </div>
             <div class="col-md-4">
                <h5>Kết nối với chúng tôi</h5>
                <a href="#" class="me-2 fs-4"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-2 fs-4"><i class="bi bi-youtube"></i></a>
                <a href="#" class="me-2 fs-4"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p>&copy; 2024 {{ setting('site.name', 'Công Ty Xây Dựng') }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
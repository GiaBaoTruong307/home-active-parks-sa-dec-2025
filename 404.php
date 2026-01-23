<?php get_header(); ?>

<main class="site-main">
    <section class="error-404">
        <h1>404</h1>
        <h2>Oops! Trang bạn tìm không tồn tại.</h2>

        <p>Có thể đường dẫn đã sai hoặc nội dung đã bị xoá.</p>

        <a href="<?php echo home_url(); ?>">
            Quay về trang chủ
        </a>
    </section>
</main>

<?php get_footer(); ?>
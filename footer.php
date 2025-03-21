<?php
$page_footer = <<<FOOTER

<footer>
    <p>&copy; 2025 Student Course Hub</p>
    <marquee>Stay updated with the latest programme news and deadlines!</marquee>
    <p>Contact us: info@university.ac.uk</p>
</footer>

<script>
    function showCourses(level) {
        document.getElementById('course-container').style.display = 'flex';
    }
    function toggleModules(courseId) {
        let modules = document.getElementById(courseId);
        modules.style.display = modules.style.display === 'block' ? 'none' : 'block';
    }
</script>

FOOTER;

echo $page_footer;
?>

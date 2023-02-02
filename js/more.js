function openCloseToc() {
    if (document.getElementById('toc-content').style.display === 'block') {
        document.getElementById('toc-content').style.display = 'none';
        document.getElementById('toc-toggle').textContent = '더보기';
    } else {
        document.getElementById('toc-content').style.display = 'block';
        document.getElementById('toc-toggle').textContent = '숨기기';
    }
}
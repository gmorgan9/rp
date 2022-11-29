const boxes = document.querySelectorAll('.a1');

for (const box of boxes) {
  box.addEventListener('click', function handleClick() {
    box.classList.add('bg-yellow');
  });
}
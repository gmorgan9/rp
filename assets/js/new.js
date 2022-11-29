var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'a') {
    ev.target.classList.toggle('checked');
  }
}, false);
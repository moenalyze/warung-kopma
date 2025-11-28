function notes(){
  const notes = document.getElementById('notes');
  const notesBtns = document.querySelectorAll('.notes-btn');
  const closeBtn = document.getElementById('close-notes-btn');

  notesBtns.forEach((notesBtn) => {
    notesBtn.addEventListener('click', () => {
      notes.classList.remove('d-none');
      notes.classList.add('d-flex');
    });
  })

  closeBtn.addEventListener('click', () => {
    notes.classList.remove('d-flex');
    notes.classList.add('d-none');
  });
}

function keranjang(){
  const detailPesanan = document.getElementById('detailPesanan');
  const keranjangBtn = document.getElementById('keranjang-btn');
  const closeBtn = document.getElementById('close-btn');
  
  keranjangBtn.addEventListener('click', () => {
    detailPesanan.classList.remove('d-none');
    detailPesanan.classList.add('d-flex');
  });

  closeBtn.addEventListener('click', () => {
    detailPesanan.classList.remove('d-flex');
    detailPesanan.classList.add('d-none');
  });
}

function empty(){
  const empty = document.getElementById('empty');
  const addBtns = document.querySelectorAll('.add-btn');
  const closeBtn = document.getElementById('close-empty-btn');

  addBtns.forEach((addBtn) => {
    addBtn.addEventListener('click', () => {
      empty.classList.remove('d-none');
      empty.classList.add('d-flex');
    });
  })

  closeBtn.addEventListener('click', () => {
    empty.classList.remove('d-flex');
    empty.classList.add('d-none');
  });
}
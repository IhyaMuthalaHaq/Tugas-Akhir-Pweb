document.addEventListener('DOMContentLoaded', function () {
  const animalContainer = document.getElementById('animalContainer');
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  const animalsPerPage = 6;
  let currentPage = 1;

  const animalCategories = [
    { type: 'Lion', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Elephant', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
    { type: 'Giraffe', image: '83520435-56a007065f9b58eba4ae8c87.jpg', link: 'pagemamalia.html' },
  ];

  function displayAnimals(page) {
    const startIdx = (page - 1) * animalsPerPage;
    const endIdx = startIdx + animalsPerPage;
    const pageAnimals = animalCategories.slice(startIdx, endIdx);

    pageAnimals.forEach(category => {
      const card = document.createElement('div');
      card.className = 'animal-card';
      card.innerHTML = `
        <a href="${category.link}">
          <img src="${category.image}" alt="${category.type}" class="animal-img">
          <div class="animal-title">${category.type}</div>
          <span class="see-more">See More</span>
        </a>
      `;

      animalContainer.appendChild(card);
    });
  }

  function loadMore() {
    currentPage++;
    displayAnimals(currentPage);

    // Sembunyikan tombol "Load More" jika semua hewan telah ditampilkan
    if (currentPage * animalsPerPage >= animalCategories.length) {
      loadMoreBtn.style.display = 'none';
    }
  }

  // Menampilkan beberapa kategori pada halaman pertama
  displayAnimals(currentPage);

  // Tambahkan event listener untuk tombol "Load More"
  loadMoreBtn.addEventListener('click', loadMore);
});

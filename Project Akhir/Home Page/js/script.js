document.addEventListener('DOMContentLoaded', function () {
    const animalContainer = document.getElementById('animalContainer');
    const animalCategories = [
      { type: 'Mamalia', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Reptil', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Ikan', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Amfibi', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Serangga', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Arachnida', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Mollusca', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Echidnodermata', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      { type: 'Annelida', image: 'cute-baby-animals-1558535060.jpg', link: 'pagekategori.html' },
      
    ];
  
    
    animalCategories.forEach(category => {
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
  
    const clearfix = document.createElement('div');
    clearfix.className = 'clearfix';
    animalContainer.appendChild(clearfix);
  });

 

  
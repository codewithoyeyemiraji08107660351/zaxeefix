const images = [
	'https://th.bing.com/th/id/OIP.u6hSk9D42_nWLiWT3CVVAwHaEi?w=276&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.ff8JBUw6QWUfcAo-uRL6_gHaFy?w=230&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.PbvS8PIXvZLKsmu1YJme5wHaE8?w=266&h=180&c=7&r=0&o=5&pid=1.7',
	'https://ts4.explicit.bing.net/th?id=OIP.mubC84JGWBt6RUOZ3uNTtQHaEK&pid=15.1',
	'https://th.bing.com/th/id/OIP.2GgtEInYei89zufP0sMaiwHaE8?w=236&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.Vt6seJ2GgViMjc4LEuo_LgHaFj?w=207&h=180&c=7&r=0&o=5&pid=1.7',
	'https://www.bing.com/images/search?view=detailV2&ccid=%2bONRGqJ0&id=E394BE5BAA8CF32F6188AB62093B68B9C2DFDB17&thid=OIP.-ONRGqJ0SBBUpRurOdMuVQHaE8&mediaurl=https%3a%2f%2fwww.adequateinfosoft.com%2fAssest%2fimages%2fmobile-repair-about.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.f8e3511aa274481054a51bab39d32e55%3frik%3dF9vfwrloOwliqw%26pid%3dImgRaw%26r%3d0&exph=667&expw=1000&q=phone+Repair&simid=608005174920151621&FORM=IRPRST&ck=CD1705C176287CFADFEBB654643B614D&selectedIndex=4&itb=0',
	'https://www.bing.com/images/search?view=detailV2&ccid=IOfwZ8mS&id=EA03671FC81AD1E12F528FE22D260D419923912D&thid=OIP.IOfwZ8mSirQpH30nJpjCmQHaE7&mediaurl=https%3a%2f%2ftechvilleonline.com%2fwp-content%2fuploads%2f2019%2f06%2fsmartphone-repair.jpeg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.20e7f067c9928ab4291f7d272698c299%3frik%3dLZEjmUENJi3ijw%26pid%3dImgRaw%26r%3d0&exph=1333&expw=2000&q=phone+Repair&simid=608030145929498393&FORM=IRPRST&ck=2A835AA177D3F2F8F51F8B96D4F9B249&selectedIndex=7&itb=0',
	'https://th.bing.com/th/id/OIP.e9eFg-_wPTCfB-mDNPihXwHaEr?w=263&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.e9eFg-_wPTCfB-mDNPihXwHaEr?w=263&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.AHqXz0wudyb6_ZA0pXek7QHaE8?w=271&h=180&c=7&r=0&o=5&pid=1.7',
	'http://localhost/Isaiah-project/admin/asset/image/logo.jpg',
	'http://localhost/Isaiah-project/admin/asset/image/ceo1.jpg',
	'http://localhost/Isaiah-project/admin/asset/image/ceo.jpg',
	'http://localhost/Isaiah-project/admin/asset/image/location.jpg',
	'http://localhost/Isaiah-project/admin/asset/image/shop1.jpg',
	'http://localhost/Isaiah-project/admin/asset/image/shop2.jpg',
	'http://localhost/Isaiah-project/admin/asset/image/laptop.jpg',
];
const banners = [
	'https://th.bing.com/th/id/OIP.nLuE7sgad_hauHDs7HJr4gHaEK?w=316&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.u6hSk9D42_nWLiWT3CVVAwHaEi?w=276&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.ff8JBUw6QWUfcAo-uRL6_gHaFy?w=230&h=180&c=7&r=0&o=5&pid=1.7',
	'https://th.bing.com/th/id/OIP.PbvS8PIXvZLKsmu1YJme5wHaE8?w=266&h=180&c=7&r=0&o=5&pid=1.7',
	'https://ts4.explicit.bing.net/th?id=OIP.mubC84JGWBt6RUOZ3uNTtQHaEK&pid=15.1',
];
let currentIndex = 0;

let currentBanner = 0;
const bannerDiv = document.querySelector('.banner');
// console.log(bannerDiv);
// console.log(document.getElementById('dynamic-img'););

function changeImage() {
	const dynamicImg = document.getElementById('dynamic-img');
	dynamicImg.src = images[currentIndex];
	currentIndex = (currentIndex + 1) % images.length;
}

function changeBanner() {
	if (bannerDiv) {
		bannerDiv.style.backgroundImage = `url('${banners[currentBanner]}')`;
		currentBanner = (currentBanner + 1) % banners.length;
	} else {
		console.log('banner not found');
	}
}

document.addEventListener('DOMContentLoaded', () => {
	changeBanner();
	setInterval(changeBanner, 3000);
});

window.onload = () => {
	changeBanner();
	setInterval(changeBanner, 3000);
};

window.onload = changeImage;
setInterval(changeImage, 5000);

//FAQ
const questions = document.querySelectorAll('.question');

questions.forEach(function (question) {
	const btn = question.querySelector('.question-btn');
	btn.addEventListener('click', function () {
		questions.forEach(function (item) {
			if (item !== question) {
				item.classList.remove('show-text');
			}
		});
		question.classList.toggle('show-text');
	});
});

//search
document.addEventListener('DOMContentLoaded', function () {
	const searchInput = document.getElementById('search');

	searchInput.addEventListener('keyup', function () {
		let searchText = this.value.trim();

		if (searchText.length > 0) {
			fetchSearchResults(searchText);
		} else {
			fetchSearchResults('');
		}
	});

	function fetchSearchResults(query) {
		let xhr = new XMLHttpRequest();
		xhr.open('POST', 'search_part.php', true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				document.querySelector('.grid-container').innerHTML = xhr.responseText;
			}
		};

		xhr.send('query=' + encodeURIComponent(query));
	}
});

//see more - see less
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.blog-content').forEach((cell) => {
		const fullText = cell.getAttribute('data-fulltext');
		const maxLength = 100;

		if (fullText.length > maxLength) {
			const shortText = fullText.substring(0, maxLength) + '...';
			cell.innerHTML = shortText;

			const seeMoreLink = document.createElement('a');
			seeMoreLink.href = 'javascript:void(0)';
			seeMoreLink.innerText = ' See More';
			seeMoreLink.classList.add('see-more');
			seeMoreLink.style.color = '#007BFF';
			seeMoreLink.style.cursor = 'pointer';
			seeMoreLink.style.fontWeight = 'bold';

			cell.appendChild(seeMoreLink);

			seeMoreLink.addEventListener('click', function () {
				if (seeMoreLink.innerText === ' See More') {
					cell.innerHTML = fullText;
					const seeLessLink = document.createElement('a');
					seeLessLink.href = 'javascript:void(0)';
					seeLessLink.innerText = ' See Less';
					seeLessLink.classList.add('see-less');
					seeLessLink.style.color = '#007BFF';
					seeLessLink.style.cursor = 'pointer';
					seeLessLink.style.fontWeight = 'bold';

					cell.appendChild(seeLessLink);

					seeLessLink.addEventListener('click', function () {
						cell.innerHTML = shortText;
						cell.appendChild(seeMoreLink);
					});
				}
			});
		}
	});
});

document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.toggle-btn').forEach((button) => {
		button.addEventListener('click', function () {
			let contentWrapper = this.closest('.content');
			let shortContent = contentWrapper.querySelector('.short-content');
			let fullContent = contentWrapper.querySelector('.full-content');

			if (
				fullContent.style.display === 'none' ||
				fullContent.style.display === ''
			) {
				fullContent.style.display = 'inline';
				shortContent.style.display = 'none';
				this.textContent = 'See less';
			} else {
				fullContent.style.display = 'none';
				shortContent.style.display = 'inline';
				this.textContent = 'See more...';
			}
		});
	});
});

document.querySelectorAll('.count').forEach(counter => {
  const updateCount = () => {
    const target = +counter.getAttribute('data-target');
    const count = +counter.innerText;
    const increment = target / 100;

    if (count < target) {
      counter.innerText = Math.ceil(count + increment);
      setTimeout(updateCount, 20);
    } else {
      counter.innerText = target;
    }
  };
  updateCount();
});

// Pie charts
const createPie = (id, value, total, color) => {
	const ctx = document.getElementById(id).getContext('2d');
	new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Used', 'Remaining'],
			datasets: [
				{
					data: [value, Math.max(0, total - value)],
					backgroundColor: [color, '#e0e0e0'],
					borderWidth: 0,
				},
			],
		},
		options: {
			cutout: '75%',
			responsive: false,
			plugins: {
				legend: { display: false },
				tooltip: {
					enabled: true,
					callbacks: {
						label: function (context) {
							const label = context.label;
							const val = context.parsed;
							return `${label}: ${val} of ${total}`;
						},
					},
				},
			},
		},
	});
};


if (typeof dataFromPHP !== 'undefined') {
	createPie('chart-customers', dataFromPHP.customers, dataFromPHP.customers, '#3fd0d4');
	createPie('chart-daily', dataFromPHP.daily, dataFromPHP.total, '#f1c40f'); 
	createPie('chart-total', dataFromPHP.total, dataFromPHP.total, '#e74c3c');
	createPie('chart-blogs', dataFromPHP.blogs, dataFromPHP.blogs, '#9b59b6');
}

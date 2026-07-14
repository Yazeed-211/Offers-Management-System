
const offers = [
    {
        title: "عرض مطعم",
        category: "Food",
        original: 100,
        discount: 50,
        image: "images/restaurant.jpg",
        description: "عرض خاص في مطعم يقدم خصم 50%"
    },
    {
        title: "غسيل سيارة",
        category: "Auto",
        original: 80,
        discount: 25,
        image: "images/car_wash.jpg",
        description: "خدمة غسيل سيارة مع خصم 25%"
    }
];
window.onload = function() {
    const dealsContainer = document.getElementById('dealsContainer');
    offers.forEach((offer, index) => {
        const dealDiv = document.createElement('div');
        dealDiv.classList.add('deal');
        dealDiv.innerHTML = `
            <img src="${offer.image}" alt="${offer.title}" onclick="showOffer(${index})">
            <h3><a href="#" onclick="showOffer(${index})">${offer.title}</a></h3>
            <p>Category: ${offer.category}</p>
            <p>Original: ${offer.original} SR</p>
            <p>Discount: ${offer.discount}%</p>
            <p class="price">${offer.original - (offer.original * offer.discount / 100)} SR</p>
        `;
        dealsContainer.appendChild(dealDiv);
    });
};

// التنقل بين الأقسام
function showSection(id) {
    document.querySelectorAll('section').forEach(sec => sec.style.display = 'none');
    document.getElementById(id).style.display = 'block';
}

// عرض تفاصيل العرض عند الضغط على المنتجات 
function showOffer(index) {
    const offer = offers[index];

    // إخفاء جميع الأقسام الأخرى
    document.querySelectorAll('section').forEach(sec => sec.style.display = 'none');

    // إظهار قسم تفاصيل العرض
    const viewSection = document.getElementById('view_offer');
    viewSection.style.display = 'block';

    // تعبئة البيانات
    document.getElementById('offerTitle').textContent = offer.title;
    document.getElementById('offerImage').src = offer.image;
    document.getElementById('offerDesc').textContent = offer.description;
    document.getElementById('offerOriginal').textContent = `Original Price: ${offer.original} SR`;
    document.getElementById('offerDiscount').textContent = `Discount: ${offer.discount}%`;
    document.getElementById('offerActual').textContent = `Actual Price: ${offer.original - (offer.original * offer.discount / 100)} SR`;
}

// إضافة للسلة
function addToCart() {
    alert("تمت إضافة العرض للسلة!");
}
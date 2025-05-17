// loadCoupons.js

fetch('/api/coupons')
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById('coupons-container');
    data.coupons.forEach(coupon => {
      const html = `
        <div class="col-md-6">
          <div class="card mb-4 p-3">
            <h5>${coupon.title}</h5>
            <p>${coupon.description}</p>
            <div class="badge bg-primary">${coupon.code}</div>
            <button class="btn btn-sm btn-outline-success mt-2" onclick="navigator.clipboard.writeText('${coupon.code}')">Copy</button>
            <p class="mt-2 small text-muted">Valid until: ${coupon.validUntil}</p>
          </div>
        </div>
      `;
      container.innerHTML += html;
    });
  })
  .catch(err => console.error('Error loading coupons', err));

export function effectivePrice(product) {
    const price = Number(product.price);
    const salePrice = Number(product.sale_price);

    return product.sale_price != null && salePrice > 0 && salePrice < price
        ? salePrice
        : price;
}

export function money(amount) {
    if(amount === null || amount === undefined) return '';

    const formated = Number(amount).toLocaleString('fr-FR');
    return `${formated} FCFA`;
}

export function discountPercentage(product) {
    const price = Number(product.price);
    const salePrice = Number(product.sale_price);
    if (product.sale_price == null || price <= 0 || salePrice <= 0 || salePrice >= price) {
        return 0;
    }

    return Math.round(((price - salePrice) / price) * 100);
}

import { Link } from '@inertiajs/react';

export default function Show({ product }) {
    return (
        <div className="min-h-screen bg-gray-50 py-10 px-4 flex items-center justify-center">
            <div className="bg-white border border-gray-200 rounded-lg shadow-lg p-8 w-full max-w-2xl">
                <img
                    src={product.image}
                    alt={product.name}
                    className="w-full h-64 object-cover rounded-lg mb-6"
                />
                <h1 className="text-3xl font-bold text-gray-800 mb-4">
                    {product.name}
                </h1>
                <p className="text-gray-600 text-lg mb-6">{product.description}</p>
                <p className="text-xl font-semibold text-gray-700 mb-8">
                    ราคา: ฿{product.price} บาท
                </p>
                <Link
                    href="/products"
                    className="inline-block bg-blue-600 text-white font-medium py-2 px-6 rounded hover:bg-blue-500 transition"
                >
                    กลับไปยังหน้าสินค้า
                </Link>
            </div>
        </div>
    );
}

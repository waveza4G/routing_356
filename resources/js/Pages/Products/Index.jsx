import { Link } from '@inertiajs/react';

export default function Index({ products }) {
    return (
        <div className="min-h-screen bg-pink-50 py-10 px-4">
            <h1 className="text-4xl font-semibold text-gray-800 text-center mb-8">
                🛍️ Board Game Shop
            </h1>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                {products.map((product) => (
                    <div
                        key={product.id}
                        className="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition"
                    >
                        <img
                            src={product.image}
                            alt={product.name}
                            className="w-full h-48 object-cover rounded-t-lg"
                        />
                        <div className="p-6">
                            <h2 className="text-lg font-semibold text-gray-800 mb-2">
                                {product.name}
                            </h2>
                            <p className="text-gray-600 text-sm mb-4">
                                ${product.price}
                            </p>
                            <Link
                                href={`/products/${product.id}`}
                                className="inline-block text-sm font-medium text-blue-600 hover:text-blue-500"
                            >
                                ดูรายละเอียดสินค้า 🔍
                            </Link>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}

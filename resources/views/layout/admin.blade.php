<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial;
    }

    body{
        display:flex;
        background:#f4f6f9;
    }

    /* Sidebar */

    .sidebar{
        width:260px;
        height:100vh;
        background:#0f172a;
        color:white;
        position:fixed;
        padding:30px 20px;
    }

    .logo{
        font-size:28px;
        font-weight:bold;
        margin-bottom:40px;
        text-align:center;
    }

    .sidebar ul{
        list-style:none;
    }

    .sidebar ul li{
        margin-bottom:15px;
    }

    .sidebar ul li a{
        text-decoration:none;
        color:white;
        display:block;
        padding:14px;
        border-radius:10px;
        transition:0.3s;
    }

    .sidebar ul li a:hover{
        background:#0ea5e9;
    }

    /* Main */

    .main{
        margin-left:260px;
        width:calc(100% - 260px);
        padding:30px;
    }

    /* Top */

    .topbar{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
    }

    .topbar h1{
        color:#0f172a;
    }

    .admin{
        background:white;
        padding:12px 20px;
        border-radius:10px;
        box-shadow:0 3px 10px rgba(0,0,0,0.08);
    }

    /* Stats */

    .stats{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
        gap:20px;
        margin-bottom:30px;
    }

    .card{
        background:white;
        padding:25px;
        border-radius:18px;
        box-shadow:0 5px 15px rgba(0,0,0,0.08);
    }

    .card h3{
        color:#666;
        margin-bottom:15px;
    }

    .card .number{
        font-size:35px;
        font-weight:bold;
        color:#0ea5e9;
    }

    /* Charts */

    .analytics{
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:20px;
        margin-bottom:30px;
    }

    .chart,
    .activity{
        background:white;
        padding:25px;
        border-radius:18px;
        box-shadow:0 5px 15px rgba(0,0,0,0.08);
    }

    .chart-box{
        height:300px;
        background:linear-gradient(to top,#0ea5e9,#bae6fd);
        border-radius:15px;
        margin-top:20px;
    }

    /* Best Products */

    .products{
        background:white;
        padding:25px;
        border-radius:18px;
        box-shadow:0 5px 15px rgba(0,0,0,0.08);
        margin-bottom:30px;
    }

    .products table{
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
    }

    .products table th,
    .products table td{
        padding:15px;
        text-align:left;
        border-bottom:1px solid #eee;
    }

    .products table th{
        background:#f8fafc;
    }

    /* Orders */

    .orders{
        background:white;
        padding:25px;
        border-radius:18px;
        box-shadow:0 5px 15px rgba(0,0,0,0.08);
    }

    .orders table{
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
    }

    .orders table th,
    .orders table td{
        padding:15px;
        text-align:left;
        border-bottom:1px solid #eee;
    }

    .orders table th{
        background:#f8fafc;
    }

    /* Status */

    .status{
        padding:8px 14px;
        border-radius:30px;
        color:white;
        font-size:14px;
    }

    .completed{
        background:#22c55e;
    }

    .pending{
        background:#f59e0b;
    }

    /* Responsive */

    @media(max-width:900px){

        .sidebar{
            width:100%;
            height:auto;
            position:relative;
        }

        body{
            flex-direction:column;
        }

        .main{
            margin-left:0;
            width:100%;
        }

        .analytics{
            grid-template-columns:1fr;
        }

    }

/* Product style */
    .products-page{
    padding:20px;
}

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.page-header h1{
    font-size:32px;
}

.add-btn{
    background:#0ea5e9;
    color:white;
    padding:12px 18px;
    border-radius:8px;
    text-decoration:none;
    font-weight:bold;
}

.products-table{
    width:100%;
    background:white;
    border-radius:10px;
    overflow:hidden;
    border-collapse:collapse;
}

.products-table th{
    background:#f3f4f6;
    padding:15px;
    text-align:left;
}

.products-table td{
    padding:15px;
    border-bottom:1px solid #eee;
}

.products-table img{
    border-radius:8px;
}

.actions{
    display:flex;
    gap:10px;
}

.edit-btn{
    background:#22c55e;
    color:white;
    padding:8px 14px;
    border-radius:6px;
    text-decoration:none;
}

.delete-btn{
    background:#ef4444;
    color:white;
    padding:8px 14px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}
/* End Prodcut style */

/* Categories Page*/
.categories-page{
    padding:20px;
}

.categories-table{
    width:100%;
    background:white;
    border-radius:10px;
    overflow:hidden;
    border-collapse:collapse;
}

.categories-table th{
    background:#f3f4f6;
    padding:15px;
    text-align:left;
}

.categories-table td{
    padding:15px;
    border-bottom:1px solid #eee;
}
/* End Categories */

/*start  categories form style */
.category-container{
    background:#fff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 5px 25px rgba(0,0,0,0.05);
    max-width:900px;
}

.category-header{
    margin-bottom:35px;
}

.category-header h1{
    font-size:40px;
    margin-bottom:10px;
    color:#111827;
}

.category-header p{
    color:#6b7280;
    font-size:16px;
}

.category-form{
    display:flex;
    flex-direction:column;
    gap:25px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group label{
    margin-bottom:10px;
    font-weight:600;
    color:#374151;
    font-size:15px;
}

.form-group input,
.form-group textarea{
    padding:16px 18px;
    border:1px solid #d1d5db;
    border-radius:12px;
    font-size:16px;
    transition:0.3s;
    outline:none;
    background:#f9fafb;
}

.form-group textarea{
    resize:none;
    height:140px;
}

.form-group input:focus,
.form-group textarea:focus{
    border-color:#2563eb;
    background:#fff;
    box-shadow:0 0 0 4px rgba(37,99,235,0.1);
}

.form-buttons{
    display:flex;
    justify-content:flex-end;
    gap:15px;
    margin-top:15px;
}

.cancel-btn{
    padding:14px 28px;
    border:none;
    border-radius:12px;
    background:#e5e7eb;
    color:#111827;
    cursor:pointer;
    font-size:15px;
    font-weight:600;
}

.save-btn{
    padding:14px 28px;
    border:none;
    border-radius:12px;
    background:#2563eb;
    color:white;
    cursor:pointer;
    font-size:15px;
    font-weight:600;
    transition:0.3s;
}

.save-btn:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}
/*End categories form style */
.success-message{
    background:#dcfce7;
    color:#166534;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
    font-weight:600;
}

.category-image{
    width:40px;
    height:40px;
    object-fit:cover;
    border-radius:10px;
}
/* Start create_product_form*/
.product-container{
    background:#ffffff;
    padding:40px;
    border-radius:20px;
    box-shadow:0 5px 30px rgba(0,0,0,0.05);
}

.product-header{
    margin-bottom:35px;
}

.product-header h1{
    font-size:34px;
    color:#111827;
    margin-bottom:10px;
}

.product-header p{
    color:#6b7280;
    font-size:15px;
}

.product-form{
    display:flex;
    flex-direction:column;
    gap:25px;
}

.form-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group label{
    margin-bottom:10px;
    font-size:15px;
    font-weight:600;
    color:#374151;
}

.form-group input,
.form-group textarea,
.form-group select{
    padding:15px;
    border:1px solid #d1d5db;
    border-radius:12px;
    outline:none;
    background:#f9fafb;
    font-size:15px;
    transition:0.3s;
}

.form-group textarea{
    resize:none;
    min-height:140px;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus{
    border-color:#2563eb;
    background:#fff;
    box-shadow:0 0 0 4px rgba(37,99,235,0.1);
}

.form-buttons{
    display:flex;
    justify-content:flex-end;
    gap:15px;
    margin-top:10px;
}

.cancel-btn{
    text-decoration:none;
    padding:14px 24px;
    background:#e5e7eb;
    color:#111827;
    border-radius:12px;
    font-weight:600;
}

.save-btn{
    padding:14px 24px;
    border:none;
    background:#2563eb;
    color:white;
    border-radius:12px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.save-btn:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}
/* End create_product_form*/

/* start show product style*/

.product-details{
    padding:40px;
}

.product-card{
    background:#fff;
    border-radius:20px;
    padding:40px;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
    box-shadow:0 5px 30px rgba(0,0,0,0.05);
}

.product-image-section{
    display:flex;
    justify-content:center;
    align-items:center;
}

.main-image{
    width:100%;
    max-width:450px;
    height:450px;
    object-fit:cover;
    border-radius:20px;
}

.product-info{
    display:flex;
    flex-direction:column;
    gap:20px;
}

.category{
    display:inline-block;
    background:#dbeafe;
    color:#2563eb;
    padding:8px 16px;
    border-radius:20px;
    font-size:14px;
    width:fit-content;
}

.product-info h1{
    font-size:38px;
    color:#111827;
}

.price{
    font-size:32px;
    color:#2563eb;
    font-weight:bold;
}

.description{
    color:#6b7280;
    line-height:1.8;
    font-size:16px;
}

.info-list{
    display:flex;
    flex-direction:column;
    gap:15px;
}

.info-item{
    background:#f9fafb;
    padding:15px;
    border-radius:12px;
}

.buttons{
    display:flex;
    gap:15px;
    margin-top:20px;
}


.back-btn{
    background:#e5e7eb;
    color:#111827;
    text-decoration:none;
    padding:14px 22px;
    border-radius:12px;
    font-weight:600;
}

@media(max-width:900px){

    .product-card{
        grid-template-columns:1fr;
    }

}

/* End show product style*/

.product-link{
    text-decoration:none;
    color:#111827;
    font-weight:600;
    font-size:16px;
    transition:0.3s;
    position:relative;
}

.product-link:hover{
    color:#2563eb;
}

.product-link::after{
    content:'';
    position:absolute;
    left:0;
    bottom:-4px;
    width:0%;
    height:2px;
    background:#2563eb;
    transition:0.3s;
}

.product-link:hover::after{
    width:100%;
}
/*Start order admin display*/

.orders-page{

width:95%;
margin:40px auto;

}

.page-header{

display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;

}

.page-header form{

display:flex;
gap:10px;

}

.page-header input,
.page-header select{

padding:10px;
border:1px solid #ddd;
border-radius:6px;

}

.orders-table{

width:100%;
border-collapse:collapse;
background:#fff;
box-shadow:0 3px 12px rgba(0,0,0,.08);

}

.orders-table th{

background:#222;
color:white;
padding:15px;

}

.orders-table td{

padding:15px;
border-bottom:1px solid #eee;

}

.orders-table tr:hover{

background:#f8f8f8;

}

.status{

padding:6px 12px;
border-radius:20px;
font-size:13px;
font-weight:bold;

}

.pending{

background:#fff3cd;
color:#856404;

}

.processing{

background:#cce5ff;
color:#004085;

}

.shipped{

background:#d4edda;
color:#155724;

}

.delivered{

background:#28a745;
color:white;

}

.cancelled{

background:#f8d7da;
color:#721c24;

}

.view-btn{

background:#0d6efd;
padding:8px 14px;
color:white;
text-decoration:none;
border-radius:6px;

}

/*End order admin display*/
/*Start customer page */

.container{

width:95%;
margin:40px auto;

}

.page-header{

display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;

}

.page-header h2{

font-size:30px;

}

.search-box{

display:flex;
gap:10px;

}

.search-box input{

padding:10px;
width:250px;
border:1px solid #ddd;
border-radius:6px;

}

.search-box button{

padding:10px 20px;
background:#007bff;
color:white;
border:none;
border-radius:6px;
cursor:pointer;

}

.customers-table{

width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 5px 20px rgba(0,0,0,.08);

}

.customers-table th{

background:#343a40;
color:white;
padding:15px;

}

.customers-table td{

padding:15px;
border-bottom:1px solid #eee;
text-align:center;

}

.customers-table tr:hover{

background:#f7f7f7;

}

.btn-view{

background:#28a745;
color:white;
padding:8px 16px;
border-radius:5px;
text-decoration:none;

}

.btn-view:hover{

background:#218838;

}

.pagination{

margin-top:25px;

}

/*End customer page */
</style>

</head>
<body>

<!-- Sidebar -->

<div class="sidebar">

    <div class="logo">
        Admin Panel
    </div>

    <ul>

        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

        <li><a href="{{ route('products.index') }}">Products</a></li>

        <li><a href="{{ route('category.index') }}">Categories</a></li>

        <li><a href="{{ route('order.index') }}">Orders</a></li>

        <li><a href="{{ route('customer.index') }}">Customers</a></li>

        <li><a href="#">Reports</a></li>

        <li><a href="#">Settings</a></li>

    </ul>

</div>

<!-- Main -->

<div class="main">
@yield('content');
</div>

</body>
</html>
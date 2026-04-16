<style>
    body {
        margin: 0;
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
        background:
            linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.65)),
            url('../assets/img/hero.jpg') no-repeat center center/cover;
    }

    .admin-layout {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 270px;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        padding: 24px 18px;
        border-right: 1px solid rgba(255,255,255,0.18);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: white;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 28px;
    }

    .brand-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        background: rgba(25,135,84,0.95);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 20px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    }

    .brand-title {
        font-weight: 700;
        font-size: 16px;
        color: white;
    }

    .brand-subtitle {
        font-size: 12px;
        color: rgba(255,255,255,0.75);
    }

    .menu-label {
        font-size: 12px;
        font-weight: 700;
        color: rgba(255,255,255,0.65);
        margin: 14px 10px 10px;
        letter-spacing: 0.5px;
    }

    .sidebar-link {
        display: block;
        text-decoration: none;
        color: white;
        padding: 12px 14px;
        border-radius: 14px;
        margin-bottom: 8px;
        transition: 0.25s;
        font-weight: 500;
        background: transparent;
    }

    .sidebar-link:hover {
        background: rgba(255,255,255,0.14);
        color: white;
    }

    .sidebar-link.active {
        background: rgba(25,135,84,0.95);
        color: white;
        font-weight: 700;
    }

    .sidebar-card {
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.14);
        color: white;
        border-radius: 20px;
        padding: 18px;
        margin-top: 20px;
    }

    .main-content {
        flex: 1;
        padding: 28px;
    }

    .topbar {
        background: rgba(255,255,255,0.14);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255,255,255,0.14);
        border-radius: 24px;
        padding: 24px 26px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        margin-bottom: 26px;
        color: white;
    }

    .topbar h2 {
        margin: 0;
        font-weight: 700;
        font-size: 30px;
    }

    .topbar p {
        margin: 8px 0 0;
        color: rgba(255,255,255,0.78);
    }

    .content-card {
        background: rgba(255,255,255,0.14);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255,255,255,0.14);
        border-radius: 22px;
        padding: 24px;
        box-shadow: 0 10px 24px rgba(0,0,0,0.12);
        color: white;
        margin-bottom: 24px;
    }

    .table-dark-glass {
        width: 100%;
        border-collapse: collapse;
        color: white;
    }

    .table-dark-glass thead th {
        background: rgba(255,255,255,0.10);
        color: white;
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid rgba(255,255,255,0.15);
    }

    .table-dark-glass tbody td {
        padding: 14px;
        border-bottom: 1px solid rgba(255,255,255,0.10);
        color: rgba(255,255,255,0.94);
        vertical-align: middle;
    }

    .table-dark-glass tbody tr:hover {
        background: rgba(255,255,255,0.05);
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.15);
    }

    .btn {
        border-radius: 12px;
    }

    .preview-img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.18);
    }

    .empty-text {
        color: rgba(255,255,255,0.75);
        margin: 0;
    }

    @media (max-width: 991px) {
        .admin-layout {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
        }

        .topbar h2 {
            font-size: 24px;
        }
    }
</style>
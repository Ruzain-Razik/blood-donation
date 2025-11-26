<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        /* Hero Section */
        .hero {
            background: url('assets/img/cover-2.png') no-repeat center center;
            background-size: cover;
            color: white;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
        }

        .hero p {
            font-size: 1.4rem;
            margin-top: 1rem;
        }

        /* Cards Section */
        .card-modern {
            border: none;
            border-radius: 20px;
            color: white;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .card-modern i {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .btn-modern {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            font-weight: bold;
            border-radius: 50px;
            padding: 0.6rem 2rem;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            background-color: white;
            transform: scale(1.05);
        }

        /* Gradient Colors for Cards */
        .card-hospital {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }

        .card-donor {
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
            color: #333;
        }

        .card-request {
            background: linear-gradient(135deg, #43cea2, #185a9d);
        }

        .card-donation {
            background: linear-gradient(135deg, #f7971e, #ffd200);
            color: #333;
        }

        /* Section Title */
        .section-title {
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
        }

        footer {
            background: #fff;
            padding: 2rem 0;
            text-align: center;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand fw-bold text-center w-100" href="#">Blood Bank</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Save Lives, Donate Blood</h1>
            <p>Connecting Donors and Hospitals. Make a difference today!</p>
        </div>
    </section>

    <!-- Quick Access Cards -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Quick Access</h2>
            <div class="row g-4">

                <!-- Hospital Registration -->
                <div class="col-md-4">
                    <div class="card-modern card-hospital h-100">
                        <i class="fas fa-hospital"></i>
                        <h5 class="fw-bold">Hospital Registration</h5>
                        <p>Register hospitals to manage blood requests and donations efficiently.</p>
                        <a href="/hospital/register" class="btn btn-modern">Go</a>
                    </div>
                </div>

                <!-- Donor Registration -->
                <div class="col-md-4">
                    <div class="card-modern card-donor h-100">
                        <i class="fas fa-user-plus"></i>
                        <h5 class="fw-bold">Donor Registration</h5>
                        <p>Sign up donors and help expand the blood donor network.</p>
                        <a href="/donor/register" class="btn btn-modern">Go</a>
                    </div>
                </div>

                <!-- Hospital Blood Request -->
                <div class="col-md-4">
                    <div class="card-modern card-request h-100">
                        <i class="fas fa-notes-medical"></i>
                        <h5 class="fw-bold">Hospital Blood Request</h5>
                        <p>Hospitals can request blood for patients seamlessly.</p>
                        <a href="blood-request/create" class="btn btn-modern">Go</a>
                    </div>
                </div>

                <!-- Donor Blood Request -->
                <div class="col-md-4">
                    <div class="card-modern card-donor h-100">
                        <i class="fas fa-hand-holding-droplet"></i>
                        <h5 class="fw-bold">Donor Blood Request</h5>
                        <p>Donors can request blood via hospitals or the blood bank.</p>
                        <a href="donor-blood-donations/create" class="btn btn-modern">Go</a>
                    </div>
                </div>

                <!-- Hospital Blood Donation -->
                <div class="col-md-4">
                    <div class="card-modern card-donation h-100">
                        <i class="fas fa-clinic-medical"></i>
                        <h5 class="fw-bold">Hospital Blood Donation</h5>
                        <p>Record blood donations made by hospitals from donors.</p>
                        <a href="blood-donations/create" class="btn btn-modern">Go</a>
                    </div>
                </div>

                <!-- Donor Blood Donation -->
                <div class="col-md-4">
                    <div class="card-modern card-donor h-100">
                        <i class="fas fa-tint"></i>
                        <h5 class="fw-bold">Donor Blood Donation</h5>
                        <p>Donors can log their blood donations to help save lives.</p>
                        <a href="#" class="btn btn-modern">Go</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Blood Bank. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

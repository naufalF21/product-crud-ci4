<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product CRUD - <?php echo $this->renderSection('title'); ?></title>
    <!-- Tailwind CSS CDN -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-success {
            background-color: #16a34a;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #15803d;
        }

        .btn-warning {
            background-color: #eab308;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .btn-warning:hover {
            background-color: #ca8a04;
        }

        .btn-danger {
            background-color: #dc2626;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #b91c1c;
        }

        .form-input {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            appearance: none;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            width: 100%;
            padding: 0.5rem 0.75rem;
            color: #374151;
            line-height: 1.25;
            font-size: 1rem;
        }

        .form-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            border-color: #3b82f6;
        }

        .card {
            background-color: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.196l-2.651 3.653a1.2 1.2 0 1 1-1.697-1.697l3.653-2.651-3.653-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.804l2.651-3.653a1.2 1.2 0 0 1 1.697 1.697L11.196 10l3.653 2.651a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-2 list-disc list-inside">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.196l-2.651 3.653a1.2 1.2 0 1 1-1.697-1.697l3.653-2.651-3.653-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.804l2.651-3.653a1.2 1.2 0 0 1 1.697 1.697L11.196 10l3.653 2.651a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </div>
</body>

</html>
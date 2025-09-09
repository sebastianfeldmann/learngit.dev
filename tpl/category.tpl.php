<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category['displayName']) ?> - Interactive Git Course</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="breadcrumbs">
                <a href="/">All Categories</a>
                <span class="breadcrumb-separator">›</span>
                <span class="current"><?= htmlspecialchars($category['displayName']) ?></span>
            </div>
            <h1><?= htmlspecialchars($category['icon'] ?? '') ?> <?= htmlspecialchars($category['displayName']) ?></h1>
            <p><?= htmlspecialchars($category['description']) ?></p>
        </div>
    </header>

    <main class="container">
        <div class="category-lessons">
            <?php if (empty($lessons)): ?>
                <div class="no-lessons">
                    <p>No lessons found in this category.</p>
                    <a href="/" class="btn">← Back to All Categories</a>
                </div>
            <?php else: ?>
                <div class="lessons-grid">
                    <?php foreach ($lessons as $lesson): ?>
                        <div class="lesson-card">
                            <div class="lesson-header">
                                <h3><a href="/lesson/<?= htmlspecialchars($lesson['slug']) ?>"><?= htmlspecialchars($lesson['title']) ?></a></h3>
                                <div class="lesson-meta">
                                    <span class="lesson-level level-<?= htmlspecialchars($lesson['level'] ?? 'beginner') ?>"><?= htmlspecialchars(ucfirst($lesson['level'] ?? 'beginner')) ?></span>
                                    <span class="lesson-time"><?= htmlspecialchars($lesson['time'] ?? 'N/A') ?></span>
                                </div>
                            </div>
                            <p class="lesson-description"><?= htmlspecialchars($lesson['description']) ?></p>
                            <a href="/lesson/<?= htmlspecialchars($lesson['slug']) ?>" class="btn btn-primary">Start Learning</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 Interactive Git Course. Learn Git step by step.</p>
        </div>
    </footer>
</body>
</html>

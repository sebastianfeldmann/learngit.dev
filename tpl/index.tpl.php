<?php
/**
 * @var array $categorizedLessons
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Git Course</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>Mastering Git</h1>
            <p>Learn Git commands through hands-on practice</p>
        </div>
    </header>

    <main class="container">
        <div class="categories-container">
            <?php if (empty($categorizedLessons)): ?>
                <p>No lessons available yet.</p>
            <?php else: ?>
                <?php foreach ($categorizedLessons as $categorySlug => $categoryData): ?>
                    <div class="category-section">
                        <div class="category-header">
                            <h2>
                                <a href="/category/<?= htmlspecialchars($categorySlug) ?>">
                                    <?= htmlspecialchars($categoryData['info']['icon'] ?? '') ?>
                                    <?= htmlspecialchars($categoryData['info']['displayName']) ?>
                                </a>
                            </h2>
                        </div>

                        <div class="lessons-grid">
                            <?php foreach ($categoryData['lessons'] as $lesson): ?>
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
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?=date('Y')?> Sebastian Feldmann. Practice makes perfect!</p>
        </div>
    </footer>
</body>
</html>

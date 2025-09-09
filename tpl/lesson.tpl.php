<?php
/**
 * @var array $lesson
 * @var array $categoryInfo
 * @var array $previousLesson
 * @var array $nextLesson
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($lesson['title']) ?> - Interactive Git Course</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/terminal.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="breadcrumbs">
                <a href="/">All Categories</a>
                <?php if ($categoryInfo): ?>
                    <span class="breadcrumb-separator">›</span>
                    <a href="/category/<?= htmlspecialchars($lesson['category']) ?>"><?= htmlspecialchars($categoryInfo['displayName']) ?></a>
                <?php endif; ?>
                <span class="breadcrumb-separator">›</span>
                <span class="current"><?= htmlspecialchars($lesson['title']) ?></span>
            </div>
            <div class="lesson-navigation">
                <?php if ($previousLesson): ?>
                    <a href="/lesson/<?= htmlspecialchars($previousLesson['slug']) ?>" class="nav-arrow nav-arrow-left" title="Previous: <?= htmlspecialchars($previousLesson['title']) ?>">
                        <span class="arrow">❮</span>
                    </a>
                <?php endif; ?>

                <h1><?= htmlspecialchars($lesson['title']) ?></h1>

                <?php if ($nextLesson): ?>
                    <a href="/lesson/<?= htmlspecialchars($nextLesson['slug']) ?>" class="nav-arrow nav-arrow-right" title="Next: <?= htmlspecialchars($nextLesson['title']) ?>">
                        <span class="arrow">❯</span>
                    </a>
                <?php endif; ?>
            </div>
            <p><?= htmlspecialchars($lesson['description']) ?></p>
        </div>
    </header>

    <main class="container">
        <div class="lesson-container">
            <div class="lesson-sidebar">
                <div class="lesson-meta-header">
                  <span class="lesson-level level-<?= htmlspecialchars($lesson['level'] ?? 'beginner') ?>"><?= htmlspecialchars(ucfirst($lesson['level'] ?? 'beginner')) ?></span>
                  <span class="lesson-time"><?= htmlspecialchars($lesson['time'] ?? 'N/A') ?></span>
                </div>
                <div class="progress-section">
                    <h3>Progress</h3>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                    <span class="progress-text" id="progressText">Step 1 of <?= count($lesson['steps']) ?></span>
                </div>

                <div class="current-step-section">
                    <h3>Current Step</h3>
                    <div class="step-info" id="currentStepInfo">
                        <h4 id="stepTitle">Loading...</h4>
                        <p id="stepDescription">Loading...</p>
                    </div>
                </div>

                <div class="hints-section">
                    <h3>Allowed Commands</h3>
                    <ul class="allowed-commands" id="allowedCommands">
                        <!-- Commands will be populated by JavaScript -->
                    </ul>
                </div>
            </div>

            <div class="terminal-section">
                <div class="terminal" id="terminal">
                    <div class="terminal-header">
                        <div class="terminal-controls">
                            <span class="control control-close"></span>
                            <span class="control control-minimize"></span>
                            <span class="control control-maximize"></span>
                        </div>
                        <div class="terminal-title">Git Terminal</div>
                    </div>
                    <div class="terminal-body" id="terminalBody">
                        <div class="terminal-output" id="terminalOutput">
                            <div class="terminal-line">
                                <span class="prompt">$ </span>
                                <span>Type the commands shown in the sidebar to proceed.</span>
                            </div>
                        </div>
                    </div>
                    <div class="terminal-input-line">
                        <span class="prompt">$ </span>
                        <input type="text" class="terminal-input" id="terminalInput" placeholder="Type your git command here..." autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <div class="lesson-complete" id="lessonComplete" style="display: none;">
            <div class="complete-message">
                <h2>🎉 Lesson Complete!</h2>
                <p>Great job! You've successfully completed this Git lesson.</p>
                <div class="complete-actions">
                    <a href="/" class="btn btn-primary">Back to Lessons</a>
                    <button class="btn btn-secondary" id="restartLesson">Restart This Lesson</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Pass lesson slug to JavaScript
        window.LESSON_SLUG = '<?= $lesson['slug'] ?? '' ?>';
    </script>
    <script src="/assets/js/terminal.js"></script>
</body>
</html>


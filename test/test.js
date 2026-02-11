class ThemeManager {
    constructor() {
        this.theme = localStorage.getItem('theme') || 'light';
        this.toggleButton = document.getElementById('theme-toggle');
        
        this.init();
    }
    
    init() {
        // Theme beim Laden anwenden
        this.applyTheme(this.theme);
        
        // Event Listener für Toggle Button
        this.toggleButton.addEventListener('click', () => {
            this.toggleTheme();
        });
        
        // System-Präferenz erkennen (optional)
        this.detectSystemPreference();
    }
    
    toggleTheme() {
        this.theme = this.theme === 'light' ? 'dark' : 'light';
        this.applyTheme(this.theme);
        this.saveTheme();
    }
    
    applyTheme(theme) {
        document.body.setAttribute('data-theme', theme);
        this.updateToggleButton(theme);
    }
    
    updateToggleButton(theme) {
        const button = this.toggleButton;
        button.setAttribute('aria-label', 
            theme === 'light' ? 'Zu Dark Mode wechseln' : 'Zu Light Mode wechseln'
        );
    }
    
    saveTheme() {
        localStorage.setItem('theme', this.theme);
    }
    
    // Optional: System-Präferenz erkennen
    detectSystemPreference() {
        if (!localStorage.getItem('theme')) {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            this.theme = prefersDark ? 'dark' : 'light';
            this.applyTheme(this.theme);
        }
        
        // Auf Änderungen der System-Präferenz reagieren
        window.matchMedia('(prefers-color-scheme: dark)')
              .addEventListener('change', (e) => {
                  if (!localStorage.getItem('theme')) {
                      this.theme = e.matches ? 'dark' : 'light';
                      this.applyTheme(this.theme);
                  }
              });
    }
}

// Theme Manager initialisieren
document.addEventListener('DOMContentLoaded', () => {
    new ThemeManager();
});

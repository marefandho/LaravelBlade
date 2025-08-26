document.addEventListener('alpine:init', () => {
  Alpine.data('modalHandler', () => ({
    isOpen: false,
    title: '',
    content: '',
    cancelText: null,
    confirmText: null,
    confirmColor: 'blue',
    actionURL: null,
    actionMethod: 'POST',

    init() {
      window.addEventListener('open-modal', e => {
        this.openModal(
          e.detail.title,
          e.detail.content,
          e.detail.cancelText,
          e.detail.confirmText,
          e.detail.confirmColor,
          e.detail.actionURL,
          e.detail.actionMethod
        )
      })
    },

    openModal(title, content, cancelText, confirmText, confirmColor, actionURL, actionMethod) {
      this.isOpen = true
      this.title = title
      this.content = content
      this.cancelText = cancelText
      this.confirmText = confirmText
      this.confirmColor = confirmColor ?? 'blue'
      this.actionURL = actionURL ?? null
      this.actionMethod = actionMethod ?? 'POST'
    },

    closeModal() { this.isOpen = false }
  }))
})

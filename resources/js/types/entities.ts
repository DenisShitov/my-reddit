export interface Article {
    id: number
    title: string
    content: string
    media: {
        preview_url: string
    }[]
}

export const nitDate = (value, format) => {
    return moment.utc(value).tz(moment.tz.guess()).format(format)
}

export const nitFromNow = (value) => {
    return moment.utc(value).tz(moment.tz.guess()).fromNow()
}

export const nitInitials = (value) => {
    let initials = value.match(/\b\w/g) || []
    initials = ((initials.shift() || '') + (initials.pop() || '')).toUpperCase()
    return initials.trim()
}
